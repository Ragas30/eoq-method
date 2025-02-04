@extends('components.users.header')
@section('title', 'home')
@section('content')
    <main class=" min-h-screen *:px-48">
        <section class="flex justify-between mt-12 py-16 gap-8 *:w-full bg-secondary">
            <div class="px-8">
                <div class="rounded-full overflow-hidden aspect-square h-96 flex justify-center items-center shadow-xl shadow-white/20">
                    <img src="https://structuralengineeringbasics.com/wp-content/uploads/2019/05/STRUCTURAL-ENGINEERING-MATERIALS-1024x530-1-1200x900.webp" class="h-full" alt="Hero Image">
                </div>
            </div>
            <div class="flex flex-col justify-center gap-10">
                <h1 class="text-5xl font-semibold">Aplikasi EOQ</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim aliquam minima dolorum. Ipsa reprehenderit perspiciatis atque voluptate consequuntur, minus provident?</p>
                <button class="bg-primary text-white rounded-xl py-3">Get Started</button>
            </div>
        </section>
        <section class="mt-8">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-semibold">Produk Kami</h2>
                <a href="{{ route('product_menu') }}" class="text-primary">Lihat Semua</a>
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
        </section>
        <section class="py-8">
            <div class="flex gap-2">
                <input type="text" class="w-full border-2 border-gray-300 p-3 rounded-lg" placeholder="Cari Produk">
                <button class="px-6 py-2 bg-primary rounded w-fit text-white font-semibold">Cari Produk</button>
            </div>
        </section>
    </main>
@endsection
