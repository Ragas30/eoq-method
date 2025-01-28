@extends('components.users.header')

@section('title', 'Detail Product')

@section('content')
    <main class="min-h-screen mt-8 p-8">
        <div class="flex justify-center item-center">
            <h1 class="text-4xl font-bold">Detail Product</h1>
        </div>
        <div class="flex justify-center items-center mt-4">
            <div class="bg-white p-8 rounded-lg shadow-xl max-w-md">
                <img src="https://picsum.photos/200/300" alt="Product Image" class="w-full h-48 object-cover">
                <h2 class="text-2xl font-bold mt-4">Nama Produk</h2>
                <p class="text-gray-600 mt-2">$ 999.999.999,99</p>
                <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vehicula, nisl at bibendum
                    ultricies, sapien enim efficitur augue, eget elementum ligula urna vitae augue. Proin pellentesque eget
                    neque eu egestas.</p>
                <div class="flex gap-4 mt-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Add to
                        Cart</button>
                    <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">Buy
                        Now</button>
                </div>
            </div>
        </div>

    </main>
@endsection
