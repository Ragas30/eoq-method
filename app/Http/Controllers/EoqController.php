<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\UraianTransaksi;
use Illuminate\Http\Request;

class EoqController extends Controller
{
    public function index()
    {
        // Ambil semua produk
        $produkList = Produk::all();
        $eoqResults = [];

        foreach ($produkList as $produk) {
            // Hitung total permintaan (D) dari uraian transaksi berdasarkan kd_produk
            $D = UraianTransaksi::where('kd_produk', $produk->kd_produk)->sum('qty');

            // Biaya pemesanan per transaksi (harus ditentukan manual)
            $S = 50000; // Contoh: Rp50.000 per pemesanan

            // Biaya penyimpanan per unit per tahun
            $H = $produk->b_simpan;

            // Hitung EOQ jika ada data
            $EOQ = $D > 0 ? sqrt((2 * $D * $S) / $H) : 0;

            // Hitung Safety Stock (diasumsikan dengan metode standar deviasi permintaan)
            $leadTime = $produk->lead_time; // Ambil lead time dari tabel produk
            $avgDemand = $D / 12; // Asumsi rata-rata permintaan per bulan

            $safetyStock = round(1.65 * sqrt($leadTime) * $avgDemand); // 1.65 untuk tingkat kepercayaan 95%
        
            // Simpan hasil ke array untuk ditampilkan di view
            $eoqResults[] = [
                'kode_produk' => $produk->kd_produk,
                'nama_produk' => $produk->nm_produk,
                'eoq' => round($EOQ, 2),
                'safety_stock' => $safetyStock
            ];

            // Update stok cadangan di database
            $produk->update(['stok_cadangan' => $safetyStock]);
        }

        return view('pages.dashboard.maintenance.eoq', compact('eoqResults'));
    }
}
