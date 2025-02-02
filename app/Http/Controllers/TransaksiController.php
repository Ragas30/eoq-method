<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::with('pelanggan')->paginate(10);
        return view('pages.dashboard.maintenance.transactions', compact('data'));
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
        $validatedData = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'id_tempat'    => 'required|exists:ongkir,id_tempat',
            'tgl_pesan'    => 'required|date',
            'total'        => 'required|integer|min:0',
            'status'       => 'required|string|max:30',
            'bukti'        => 'required|image|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('bukti')) {
            $bukti = $request->file('bukti');
            $extension = $bukti->getClientOriginalExtension();  // Ambil ekstensi file

            // Nama file unik
            $namaBukti = time() . '_' . uniqid() . '.' . $extension;

            // Simpan file ke folder uploads/bukti
            $bukti->move(public_path('uploads/bukti'), $namaBukti);

            // Simpan path ke database
            $validatedData['bukti'] = 'uploads/bukti/' . $namaBukti;
        } else {
            $validatedData['bukti'] = null;  // Jika tidak ada file, set null
        }

        // Simpan data ke database (kd_pesanan akan otomatis dibuat)
        Transaksi::create($validatedData);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
