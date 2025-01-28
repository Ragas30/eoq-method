<?php

namespace App\Http\Controllers;

use App\Models\Ongkir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OngkirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ongkir::paginate(10);
        return view('pages.dashboard.maintenance.shipping_rate', compact('data'));
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
            'daerah' => 'required|string|max:255',
            'tarif' => 'required|integer|min:0',
        ]);

        Ongkir::create($validated);
        return redirect()->route('ongkir.index')->with('success', 'Data ongkir berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ongkir $ongkir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ongkir $ongkir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ongkir $ongkir)
    {
        $validated = $request->validate([
            'daerah' => 'required|string|max:255',
            'tarif' => 'required|integer|min:0', // misalnya tarif harus angka dan lebih dari 1000
        ]);

        // Memperbarui data pada model yang sudah ada
        $ongkir->update($validated);

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('ongkir.index')->with('success', 'Data Ongkir berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ongkir $ongkir)
    {
        $ongkir->delete();

        return redirect()->route('ongkir.index')->with('success', 'Data ongkir berhasil dihapus!');
    }
}
