<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class produkMasukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $supplier = Supplier::all();
        return view('pages.dashboard.maintenance.produk_masuk', compact('produk', 'supplier'));
    }
}
