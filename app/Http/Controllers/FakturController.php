<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\UraianTransaksi;

class FakturController extends Controller
{
    public function index(string $id_transaksi)
    {
        $trx = Transaksi::where('id_transaksi', $id_transaksi)->first();
        $fakturs = UraianTransaksi::where('id_transaksi', $id_transaksi)->get();
        return view('pages.dashboard.print.nota_pesanan', compact('fakturs', 'trx'));
    }

    public function pemesanan($id_pesan, $kd_produk)
    {
        $produk = Produk::findOrFail($kd_produk);
        $pemesanan = Pemesanan::findOrFail($id_pesan);
        return view('pages.dashboard.print.faktur_barang_masuk', compact('pemesanan', 'produk'));
    }
}
