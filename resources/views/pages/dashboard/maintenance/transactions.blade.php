@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('heading', 'Transaksi')

@section('content')
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Invoice</th>
                <th class="px-4 py-2">Bukti Bayar</th>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Customer</th>
                <th class="px-4 py-2">Total</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b">
                <td class="px-4 py-2">1</td>
                <td class="px-4 py-2">INV-001</td>
                <td class="px-4 py-2"><img src="bukti-bayar-1.jpg" alt="Bukti Bayar" class="h-10"></td>
                <td class="px-4 py-2">2022-11-29</td>
                <td class="px-4 py-2">Fajar</td>
                <td class="px-4 py-2">Rp. 1.000.000</td>
                <td class="px-4 py-2">Menunggu Bayar</td>
                <td class="px-4 py-2">
                    <a href=""
                        class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Bayar</a>
                    <a href=""
                        class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">Batal</a>
                </td>
            </tr>
            <tr>
                <td class="px-4 py-2">2</td>
                <td class="px-4 py-2">INV-002</td>
                <td class="px-4 py-2"><img src="bukti-bayar-2.jpg" alt="Bukti Bayar" class="h-10"></td>
                <td class="px-4 py-2">2022-11-29</td>
                <td class="px-4 py-2">Fajar</td>
                <td class="px-4 py-2">Rp. 1.000.000</td>
                <td class="px-4 py-2">Menunggu Bayar</td>
                <td class="px-4 py-2">
                    <a href=""
                        class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Bayar</a>
                    <a href=""
                        class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">Batal</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
