@extends('components.users.header')

@section('title', 'Keranjang')

@section('content')
    <main class="min-h-screen bg-white">
        <div class="container mx-auto mt-8 p-4">
            <h1 class="text-2xl font-bold mb-4">Isi Keranjang</h1>
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">Produk</th>
                        <th class="py-2 px-4 border">Harga</th>
                        <th class="py-2 px-4 border">Jumlah</th>
                        <th class="py-2 px-4 border">Subtotal</th>
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border">Produk A</td>
                        <td class="py-2 px-4 border">Rp100.000</td>
                        <td class="py-2 px-4 border">
                            <input type="number" value="1" class="w-16 border rounded">
                        </td>
                        <td class="py-2 px-4 border">Rp100.000</td>
                        <td class="py-2 px-4 border">
                            <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="flex justify-end mt-4">
                <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Checkout</button>
            </div>
        </div>
    </main>

@endsection

