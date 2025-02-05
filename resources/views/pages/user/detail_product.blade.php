@extends('components.users.header')

@section('title', 'Detail Product')

@section('content')
    <main class="min-h-screen mt-12 p-8 bg-gray-100 flex flex-col gap-8 *:mx-96">
        <div class="flex flex-col justify-center">
            <div class="flex *:w-full">
                <div class="relative">
                    <img src="https://picsum.photos/800/400" alt="Product Image" class="w-full h-80 object-cover">
                    <div class="absolute top-4 left-4 bg-red-500 text-white text-sm px-3 py-1 rounded-full shadow-lg">
                        Best Seller
                    </div>
                </div>
                <div class="mx-16">
                    <h2 class="text-4xl font-bold text-gray-800">{{ $produk->nm_produk }}</h2>
                    <p class="text-2xl text-red-500 mt-2 font-semibold">{{ $produk->harga }}</p>
                    <p class="mt-4 text-gray-600 leading-relaxed">
                        {{ $produk->deskripsi }}
                    </p>
                    <div class="flex flex-col gap-4 mt-6">
                        <form action="{{ route('cart.store', ['kd_produk' => $produk->kd_produk]) }}" method="POST"
                            id="addToCartForm">
                            @csrf
                            <button type="button" id="addToCartButton"
                                class="flex-1 bg-blue-600 text-white font-bold px-6 py-3 rounded-lg hover:bg-blue-700 transition shadow-md flex items-center justify-center gap-2">
                                <i class="fa-solid fa-cart-shopping"></i>
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <h3 class="text-2xl font-semibold text-gray-800 border-b pb-2">Product Features</h3>
                <ul class="mt-4 space-y-2 grid grid-cols-2">
                    <li class="flex items-center text-gray-700"><span class="text-green-500 mr-2">✔</span> Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit.</li>
                    <li class="flex items-center text-gray-700"><span class="text-green-500 mr-2">✔</span> Nullam vehicula,
                        nisl at bibendum ultricies.</li>
                    <li class="flex items-center text-gray-700"><span class="text-green-500 mr-2">✔</span> Proin
                        pellentesque eget neque eu egestas.</li>
                </ul>
            </div>
        </div>
        <h2 class="text-3xl font-semibold">Produk Lainnya</h2>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('addToCartButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Added to Cart!',
                text: 'Produk Berhasil di masukan ke keranjang',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('addToCartForm').submit();
                }
            });
        });
    </script>
@endsection
