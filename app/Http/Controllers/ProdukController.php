<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::paginate(10);
        return view('pages.dashboard.maintenance.product', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nm_produk' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|integer|min:0',
            'harga_beli' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string|max:1000',
            'gambar' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lead_time' => 'required|numeric|min:0',
            'b_pesan' => 'required|numeric|min:0',
            'b_simpan' => 'required|numeric|min:0',
            'stok_cadangan' => 'required|numeric|min:0',
        ]);

        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $filename = time() . '-' . uniqid() . '.' . $extension;

            $gambarPath = $request->file('gambar')->storeAs('produk', $filename, 'public');
        } else {
            $gambarPath = null; 
        }

        Produk::create([
            'nm_produk' => $validated['nm_produk'],
            'stok' => $validated['stok'],
            'satuan' => $validated['satuan'],
            'harga' => $validated['harga'],
            'harga_beli' => $validated['harga_beli'],
            'deskripsi' => $validated['deskripsi'],
            'gambar' => $gambarPath,
            'lead_time' => $validated['lead_time'],
            'b_pesan' => $validated['b_pesan'],
            'b_simpan' => $validated['b_simpan'],
            'stok_cadangan' => $validated['stok_cadangan'],
        ]);

        return redirect()->route('pages.dashboard.maintenance.product')->with('success', 'Data produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('pages.dashboard.maintenance.product', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
