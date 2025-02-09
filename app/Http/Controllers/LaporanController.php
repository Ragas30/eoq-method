<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\UraianTransaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function daily(Request $request)
    {
        $tanggal = $request->input('tanggal', Carbon::today()->toDateString());

        $transaksi = UraianTransaksi::whereHas('transaksi', function ($query) use ($tanggal) {
            $query->whereDate('tgl_pesan', $tanggal)
                ->where('status', 'success');
        })->with('produk')->get();

        return view('pages.dashboard.report.daily', compact('transaksi', 'tanggal'));
    }

    public function monthly(Request $request)
    {
        $bulan = $request->input('bulan', Carbon::now()->month);
        $tahun = $request->input('tahun', Carbon::now()->year);

        $transaksi = UraianTransaksi::whereHas('transaksi', function ($query) use ($bulan, $tahun) {
            $query->whereYear('tgl_pesan', $tahun)
                ->whereMonth('tgl_pesan', $bulan)
                ->where('status', 'success');
        })->with('produk')->get();

        return view('pages.dashboard.report.monthly', compact('transaksi', 'bulan', 'tahun'));
    }

    public function yearly(Request $request)
    {
        $tahun = $request->input('tahun', Carbon::now()->year);

        $transaksi = UraianTransaksi::whereHas('transaksi', function ($query) use ($tahun) {
            $query->whereYear('tgl_pesan', $tahun)
                ->where('status', 'success');
        })->with('produk')->get();

        return view('pages.dashboard.report.yearly', compact('transaksi', 'tahun'));
    }
}
