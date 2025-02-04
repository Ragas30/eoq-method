@extends('components.users.header')

@section('title', 'Keranjang')

@section('content')
    <main class="min-h-screen bg-white">
        <div class="container mx-auto mt-8 p-4">
            <h1 class="text-2xl font-bold mb-4">Isi Keranjang</h1>
            @if ($keranjangItems->isEmpty())
                <div class="text-center">
                    <p class="text-gray-500">Keranjang masih kosong</p>
                </div>
            @else
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
                        @foreach ($keranjangItems as $item)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border">{{ $item->produk->nm_produk }}</td>
                                <td class="py-2 px-4 border">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="py-2 px-4 border">
                                    <input type="number" value="{{ $item->jumlah }}" class="w-16 border rounded">
                                </td>
                                <td class="py-2 px-4 border">
                                    Rp{{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}
                                </td>
                                <td class="py-2 px-4 border">
                                    {{-- <form action="{{ route('keranjang.destroy', $item->id_keranjang) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                            Hapus
                                        </button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <div class="flex justify-end mt-4">
                <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Checkout</button>
            </div>
        </div>
    </main>

@endsection
