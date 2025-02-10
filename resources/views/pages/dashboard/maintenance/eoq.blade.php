@extends('layout.layout_dashboard')

@section('title', 'Maintenance | TOKO BANGUNAN ONE')

@section('heading', 'Proses EOQ')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Hasil Perhitungan EOQ</h1>
        <table class="table-auto w-full border-collapse border border-gray-400">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-400 px-4 py-2">Kode Produk</th>
                    <th class="border border-gray-400 px-4 py-2">Nama Produk</th>
                    <th class="border border-gray-400 px-4 py-2">EOQ</th>
                    <th class="border border-gray-400 px-4 py-2">Safety Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eoqResults as $item)
                    <tr>
                        <td class="border border-gray-400 px-4 py-2">{{ $item['kode_produk'] }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $item['nama_produk'] }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $item['eoq'] }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $item['safety_stock'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
