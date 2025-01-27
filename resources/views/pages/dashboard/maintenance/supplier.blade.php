@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('content')
    <div class="bg-gray-200 p-4">
        <h1>Data Supplier</h1>
    </div>

    <div class="bg-gray-200 p-6 mt-4 shadow rounded-lg">
        <div class="mb-4">
            <a href="" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Tambah
                Suplier</a>
        </div>
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Supplier</th>
                    <th class="px-4 py-2">Alamat</th>
                    <th class="px-4 py-2">No Telepon</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-4 py-2">1</td>
                    <td class="px-4 py-2">Supplier A</td>
                    <td class="px-4 py-2">Jakarta</td>
                    <td class="px-4 py-2">08123456789</td>
                    <td class="px-4 py-2">
                        <a href=""
                            class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Edit</a>
                        <a href=""
                            class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-2">2</td>
                    <td class="px-4 py-2">Supplier B</td>
                    <td class="px-4 py-2">Bandung</td>
                    <td class="px-4 py-2">08123456789</td>
                    <td class="px-4 py-2">
                        <a href=""
                            class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Edit</a>
                        <a href=""
                            class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
