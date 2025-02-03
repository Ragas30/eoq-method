@extends('components.users.header')

@section('title', 'Product')

@section('content')
    <main class=" min-h-screen m-4 p-16">
        <div class="flex justify-center items-center">
            <div class="pt-8">
                <h1 class="text-4xl font-bold font-serif">Our Product</h1>
            </div>
        </div>

        <div class="mx-8 px-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 mb-4">
                <div class="bg-white p-4 rounded-lg shadow-xl">
                    <a class="text-lg font-semibold mt-2">Kategori</a>
                    <ul class="list-disc pl-4">
                        <li><a href="#" class="hover:underline">Bahan Bangunan</a></li>
                        <li><a href="#" class="hover:underline">Alat Bangunan</a></li>
                        <li><a href="#" class="hover:underline">Material Bangunan</a></li>
                        <li><a href="#" class="hover:underline">Perlengkapan Bangunan</a></li>
                    </ul>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($produk as $item)
                    <div class="bg-white p-4 rounded-lg shadow-xl">
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="" class="w-full h-48 object-cover">
                        <a href="{{ route('detail_product', $item->id) }}"
                            class="text-lg font-semibold mt-2">{{ $item->nm_produk }}</a>
                        <p class="text-gray-600">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
