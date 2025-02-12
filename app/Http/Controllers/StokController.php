<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    public function index()
    {
        $data = Produk::all();
        $supplier = Supplier::all();
        return view('pages.dashboard.maintenance.stock', compact('data', 'supplier'));
    }

    public function update(Request $request, $kd_produk)
    {
        $produk = Produk::findOrFail($kd_produk);

        $validated = $request->validate([
            'id_supplier' => 'required|exists:supplier,id_supplier',
            'jml_beli' => 'required|numeric|min:1',
        ]);

        $validated['total_beli'] = $validated['jml_beli'] * $produk->harga_beli;
        $validated['tgl_pesan'] = now();

        $pesanan = DB::transaction(function () use ($validated, $produk) {
            $pesanan = Pemesanan::create($validated);

            $produk->stok += $validated['jml_beli'];
            $produk->save();

            return $pesanan;
        });

        return redirect()->route('dashboard.print.faktur-barang-masuk', [$pesanan->id_pesan, $kd_produk])->with('success', 'Stok berhasil diupdate');
    }
}
