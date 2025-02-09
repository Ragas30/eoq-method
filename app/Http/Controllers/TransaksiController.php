<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\UraianTransaksi;
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
    public function update(Transaksi $transaksi)
    {
        if ($transaksi->status !== 'success') {
            // Update status transaksi
            $transaksi->status = 'success';
            $transaksi->save();

            // Ambil semua produk dalam transaksi
            foreach ($transaksi->uraianTransaksi as $uraian) {
                $produk = $uraian->produk;

                if ($produk) {
                    // Kurangi stok sesuai qty
                    $produk->stok -= $uraian->qty;
                    $produk->save();
                }
            }

            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dikonfirmasi dan stok diperbarui!');
        }

        return redirect()->route('transactions.index')->with('info', 'Transaksi sudah dikonfirmasi sebelumnya.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->update(['status' => 'canceled']);
        UraianTransaksi::where('id_transaksi', $transaksi->id_transaksi)->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dibatalkan!');
    }
}
