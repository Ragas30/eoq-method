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
            'kd_produk' => 'required|string|max:10|unique:produk,kd_produk',
            'nm_produk' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|integer|min:0',
            'harga_beli' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string|max:1000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'lead_time' => 'required|numeric|min:0',
            'b_pesan' => 'required|numeric|min:0',
        ]);
        
        $validated['b_simpan'] = 0.20 * $validated['harga_beli'];

        // Handle Upload Gambar
        $gambar = $request->file('gambar');
        $namaGambar = time() . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();

        // Simpan ke folder public/produk
        $gambar->move(public_path('uploads/produk'), $namaGambar);

        // Simpan path ke database
        $validated['gambar'] = 'uploads/produk/' . $namaGambar;

        // Simpan Data ke Database
        Produk::create($validated);

        return redirect()->route('products.index')->with('success', 'Data produk berhasil ditambahkan');
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
        // Validasi data yang diterima
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

        // Jika ada gambar baru yang di-upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar && file_exists(public_path($produk->gambar))) {
                unlink(public_path($produk->gambar));  // Menghapus gambar lama
            }

            // Upload gambar baru
            $gambar = $request->file('gambar');
            $extension = $gambar->getClientOriginalExtension();
            $namaGambar = time() . '_' . uniqid() . '.' . $extension;
            $gambar->move(public_path('uploads/produk'), $namaGambar);
            $validated['gambar'] = 'uploads/produk/' . $namaGambar;
        } else {
            // Jika gambar tidak diubah, tetap menggunakan gambar lama
            $validated['gambar'] = $produk->gambar;
        }

        // Update data produk
        $produk->update($validated);

        return redirect()->route('products.index')->with('success', 'Data produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('products.index')->with('success', 'Data produk berhasil dihapus');
    }
}
