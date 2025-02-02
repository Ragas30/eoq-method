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
}
