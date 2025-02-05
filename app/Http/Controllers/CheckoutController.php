<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Ongkir;
use App\Models\Transaksi;
use App\Models\UraianTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $ongkir = Ongkir::all();
        $keranjangItems = Keranjang::with('produk')->where('id_pelanggan', $request->user()->pelanggan->id_pelanggan)->get();
        return view('pages.user.check_out', compact('ongkir', 'keranjangItems'));
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'id_tempat' => 'required|exists:ongkir,id_tempat',
            'bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar
        ]);

        $id_pelanggan = $request->user()->pelanggan->id_pelanggan;
        $keranjangItems = Keranjang::where('id_pelanggan', $id_pelanggan)->get();

        if ($keranjangItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong.');
        }

        // Simpan bukti pembayaran
        $bukti = $request->file('bukti');
        $extension = $bukti->getClientOriginalExtension();
        $namaBukti = time() . '_' . uniqid() . '.' . $extension;
        $bukti->move(public_path('uploads/bukti'), $namaBukti);
        $buktiPath = 'uploads/bukti/' . $namaBukti;

        // Ambil ongkir berdasarkan id_tempat
        $ongkir = Ongkir::where('id_tempat', $validated['id_tempat'])->first()->ongkir;

        // Hitung total harga (subtotal produk + ongkir)
        $subtotal = $keranjangItems->sum(function ($item) {
            return $item->produk->harga * $item->jumlah;
        });

        $totalHarga = $subtotal + $ongkir;

        DB::transaction(function () use ($id_pelanggan, $keranjangItems, $totalHarga, $validated, $buktiPath) {
            // Simpan transaksi
            $transaksi = Transaksi::create([
                'id_pelanggan' => $id_pelanggan,
                'id_tempat' => $validated['id_tempat'],
                'tgl_pesan' => now(),
                'total' => $totalHarga,
                'status' => 'pending',
                'bukti' => $buktiPath,
            ]);

            // Simpan uraian transaksi (detail produk)
            foreach ($keranjangItems as $item) {
                UraianTransaksi::create([
                    'id_transaksi' => $transaksi->id_transaksi,
                    'kd_produk' => $item->kd_produk,
                    'qty' => $item->jumlah,
                    'hrg' => $item->produk->harga,
                ]);
            }

            // Kosongkan keranjang setelah checkout
            Keranjang::where('id_pelanggan', $id_pelanggan)->delete();
        });

        return redirect()->route('checkout.success')->with('success', 'Checkout berhasil! Pesanan Anda sedang diproses.');
    }
}
