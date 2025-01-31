@extends('components.users.header')

@section('title', 'Detail Product')

@section('content')
    <main class="min-h-screen mt-12 p-8 bg-gray-100">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="relative">
                <img src="https://picsum.photos/800/400" alt="Product Image" class="w-full h-80 object-cover">
                <div class="absolute top-4 left-4 bg-red-500 text-white text-sm px-3 py-1 rounded-full shadow-lg">
                    Best Seller
                </div>
            </div>
            <div class="p-6">
                <h2 class="text-4xl font-bold text-gray-800">Nama Produk</h2>
                <p class="text-2xl text-red-500 mt-2 font-semibold">$ 999.999.999,99</p>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vehicula, nisl at bibendum ultricies,
                    sapien enim efficitur augue, eget elementum ligula urna vitae augue.
                </p>
                <div class="flex gap-4 mt-6">
                    <button
                        class="flex-1 bg-blue-600 text-white font-bold px-6 py-3 rounded-lg hover:bg-blue-700 transition shadow-md flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L4 3m0 0H3" />
                        </svg>
                        Add to Cart
                    </button>
                    <button
                        class="flex-1 bg-green-600 text-white font-bold px-6 py-3 rounded-lg hover:bg-green-700 transition shadow-md flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c.53 0 1.04.21 1.41.59l3.88 3.88a2 2 0 11-2.82 2.82L12 13.82l-2.47 2.47a2 2 0 11-2.82-2.82l3.88-3.88A2 2 0 0112 8z" />
                        </svg>
                        Buy Now
                    </button>
                </div>
                <div class="mt-8">
                    <h3 class="text-2xl font-semibold text-gray-800 border-b pb-2">Product Features</h3>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-center text-gray-700"><span class="text-green-500 mr-2">✔</span> Lorem ipsum
                            dolor sit amet, consectetur adipiscing elit.</li>
                        <li class="flex items-center text-gray-700"><span class="text-green-500 mr-2">✔</span> Nullam
                            vehicula, nisl at bibendum ultricies.</li>
                        <li class="flex items-center text-gray-700"><span class="text-green-500 mr-2">✔</span> Proin
                            pellentesque eget neque eu egestas.</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
