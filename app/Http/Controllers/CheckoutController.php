<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'id_tempat' => 'required|exists:ongkir,id_tempat',
            'bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar
        ]);

        $id_pelanggan = $request->user()->pelanggan->id_pelanggan;
        $keranjangItems = Keranjang::where('id_pelanggan', $id_pelanggan)->get();

        if ($keranjangItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong.');
        }
    }
}
