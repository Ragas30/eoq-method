<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class FakturController extends Controller
{
    public function index()
    {
        $fakturs = Transaksi::all();
        return view('pages.dashboard.print.nota_pesanan', compact('fakturs'));
    }
}
