@extends('components.users.header')

@section('title', 'Detail Product')

@section('content')
    <main class="min-h-screen mt-12 p-8 bg-gray-100 flex flex-col gap-8 2xl:*:mx-96">
        <div class="flex flex-col justify-center bg-white p-4 items-center shadow-lg rounded-lg">
            <div class="flex *:w-full">
                <div class="relative">
                    <img src="../{{ $produk->gambar }}" alt="Product Image" class="w-full h-80 object-cover">
                    <div class="absolute top-4 left-4 bg-red-500 text-white text-sm px-3 py-1 rounded-full shadow-lg">
                        Best Seller
                    </div>
                </div>
                <div class="mx-16">
                    <h2 class="text-4xl font-bold text-gray-800">{{ $produk->nm_produk }}</h2>
                    <p class="text-2xl text-red-500 mt-2 font-semibold">Rp. {{ number_format($produk->harga, 0, ',', '.') }}
                    </p>
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
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('addToCartButton').addEventListener('click', function() {
            @if (Auth::check())
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
            @else
                window.location.href = "{{ route('login') }}";
            @endif
        });
    </script>
@endsection
