<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index(Request $request)
    {
        $id_pelanggan = $request->user()->id;
        $keranjangItems = Keranjang::with('produk')
            ->where('id_pelanggan', $id_pelanggan)
            ->get();

        return view('pages.user.keranjang', compact('keranjangItems'));
    }

    public function store(Request $request, string $kd_produk)
    {
        $id_pelanggan = $request->user()->id;
        $produk = Produk::where('kd_produk', $kd_produk)->first();

        $keranjangItem = Keranjang::where('id_pelanggan', $id_pelanggan)
            ->where('kd_produk', $produk->kd_produk)
            ->first();

        if ($keranjangItem) {
            // Jika produk sudah ada, update jumlahnya
            $keranjangItem->jumlah += 1;  // Tambahkan jumlah yang diminta
            $keranjangItem->save();
        } else {
            // Jika produk belum ada, tambahkan produk ke keranjang
            Keranjang::create([
                'id_pelanggan' => $id_pelanggan,
                'kd_produk' => $produk->kd_produk,
                'jumlah' => 1,
                'harga' => $produk->harga,
            ]);
        }

        // Redirect atau respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function destroy(Request $request, string $kd_produk)
    {
        $id_pelanggan = $request->user()->pelanggan->id_pelanggan;
        $keranjangItem = Keranjang::where('id_pelanggan', $id_pelanggan)
            ->where('kd_produk', $kd_produk)
            ->first();

        if ($keranjangItem) {
            $keranjangItem->delete();
        }

        // Redirect atau respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
