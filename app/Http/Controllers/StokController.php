<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $data = Produk::all();
        return view('pages.dashboard.maintenance.stock', compact('data'));
    }

    public function update(Request $request, $kd_produk)
    {
        $data = Produk::findOrFail($kd_produk);
        $data->stok += $request->stok;
        $data->save();

        return redirect()->route('stok.index')->with('success', 'Stok berhasil diupdate');
    }
}
