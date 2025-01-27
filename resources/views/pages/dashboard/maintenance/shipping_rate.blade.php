@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('content')
    <div class="bg-gray-200 p-4">
        <h1>Shipping Rate</h1>
    </div>

    <div class="mt-4">
        <div class="flex justify-start mb-4">
            <a href="" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Add New</a>
        </div>
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-300">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Kota</th>
                    <th class="px-4 py-2">Biaya</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2 border">1</td>
                    <td class="px-4 py-2 border">Jakarta</td>
                    <td class="px-4 py-2 border">Rp. 10.000</td>
                    <td class="px-4 py-2 border">
                        <a href=""
                            class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Edit</a>
                        <a href=""
                            class="ml-2 bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border">2</td>
                    <td class="px-4 py-2 border">Bandung</td>
                    <td class="px-4 py-2 border">Rp. 8.000</td>
                    <td class="px-4 py-2 border">
                        <a href=""
                            class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Edit</a>
                        <a href=""
                            class="ml-2 bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border">3</td>
                    <td class="px-4 py-2 border">Surabaya</td>
                    <td class="px-4 py-2 border">Rp. 12.000</td>
                    <td class="px-4 py-2 border">
                        <a href=""
                            class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Edit</a>
                        <a href=""
                            class="ml-2 bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border">4</td>
                    <td class="px-4 py-2 border">Yogyakarta</td>
                    <td class="px-4 py-2 border">Rp. 9.000</td>
                    <td class="px-4 py-2 border">
                        <a href=""
                            class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Edit</a>
                        <a href=""
                            class="ml-2 bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border">5</td>
                    <td class="px-4 py-2 border">Medan</td>
                    <td class="px-4 py-2 border">Rp. 11.000</td>
                    <td class="px-4 py-2 border">
                        <a href=""
                            class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Edit</a>
                        <a href=""
                            class="ml-2 bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
