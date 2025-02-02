@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('heading', 'Transaksi')

@section('content')
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Kode Pesanan</th>
                <th class="px-4 py-2">Bukti Bayar</th>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Customer</th>
                <th class="px-4 py-2">Total</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $trx)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $trx->kd_pesanan }}</td>
                    <td class="px-4 py-2"><a href="../{{ $trx->bukti }}" target="_blank" class="text-blue-500 hover:text-blue-600">Lihat Bukti</a></td>
                    <td class="px-4 py-2">{{ $trx->tgl_pesan }}</td>
                    <td class="px-4 py-2">{{ $trx->pelanggan->nm_lengkap }}</td>
                    <td class="px-4 py-2">Rp. {{ $trx->total }}</td>
                    <td class="px-4 py-2">{{ $trx->status }}</td>
                    <td class="px-4 py-2">
                        <a href=""
                            class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Bayar</a>
                        <a href=""
                            class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">Batal</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
