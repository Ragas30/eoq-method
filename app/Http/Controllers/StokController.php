<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\UraianTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    public function index()
    {
        $data = Produk::all();
        $supplier = Supplier::all();
        $calculation = [];

        foreach ($data as $d) {
            $D = UraianTransaksi::where('kd_produk', $d->kd_produk)->sum('qty');

            $S = 50000;

            $H = $d->b_simpan;

            $EOQ = $D > 0 ? sqrt((2 * $D * $S) / $H) : 0;

            $leadTime = $d->lead_time;
            $avgDemand = $D / 7;

            $safetyStock = round(1.65 * sqrt($leadTime) * $avgDemand);

            $calculation[] = [
                'kode_produk' => $d->kd_produk,
                'nama_produk' => $d->nm_produk,
                'eoq' => round($EOQ),
                'rop' => round($leadTime * $avgDemand) + $safetyStock,
                'safety_stock' => $safetyStock
            ];

            $d->update(['stok_cadangan' => $safetyStock]);
        }

        $data->transform(function ($item) use ($calculation) {
            $insertedData = collect($calculation)->firstWhere('kode_produk', $item->kd_produk);

            if ($insertedData) {
                $item->eoq = $insertedData['eoq'];
                $item->rop = $insertedData['rop'];
            } else {
                $item->eoq = 0;
                $item->rop = 0;
            }

            return $item;
        });

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
