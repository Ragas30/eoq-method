@extends('components.users.header')

@section('title', 'Check Out')

@section('content')
    <main class="min-h-screen mt-12 p-8 bg-gray-100 flex flex-col gap-8 *:mx-96">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Checkout</h2>
        <form action="{{ route('check_out_post') }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-lg"
            enctype="multipart/form-data">
            @csrf
            <div>
                <label for="ongkir" class="block text-lg font-semibold text-gray-700">Ongkir</label>
                <select onchange="updateOngkir(this)" name="id_tempat" id="ongkirSelect"
                    class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option disabled selected>Pilih Tujuan</option>
                    @foreach ($ongkir as $ong)
                        <option value="{{ $ong->id_tempat }}" data-tarif="{{ $ong->tarif }}">{{ $ong->daerah }} (Rp.
                            {{ $ong->tarif }})</option>
                    @endforeach
                </select>
                <input type="file" name="bukti" id="bukti"
                    class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex justify-end">
                <button id="placeOrderButton" type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-md">Place
                    Order</button>
            </div>
            <div class="p-4 pt-2 rounded-xl bg-slate-500 border">
                <h2 class="mb-1 text-xl font-bold text-white">List Keranjang</h2>
                <div class="flex gap-2">
                    <div class="flex-grow flex flex-col gap-3">
                        @foreach ($keranjangItems as $item)
                            <div class="border bg-slate-200 px-2 py-1 rounded-xl">
                                <p>{{ $item->produk->nm_produk }} - {{ $item->qty }} x </p>
                                <p>Jumlah : {{ $item->jumlah }} x Rp. {{ $item->harga }} = Rp.
                                    {{ $item->jumlah * $item->harga }}</p>
                            </div>
                        @endforeach
                        @empty($keranjangItems)
                            <p>Keranjang Kosong</p>
                        @endempty
                    </div>
                    <div class="bg-slate-200 min-w-48 rounded-xl p-2 flex flex-col justify-between">
                        <p class="font-semibold">Total Belanjaan</p>
                        <div>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($keranjangItems as $item)
                                <p class="flex justify-between">
                                    <span>Rp. </span>
                                    <span>{{ $item->jumlah * $item->harga }}</span>
                                </p>
                                @php
                                    $total += $item->jumlah * $item->harga;
                                @endphp
                            @endforeach
                        </div>
                        <div class="*:flex *:justify-between">
                            <p>
                                <span class="font-semibold">Ongkir</span>
                                <span class="font-semibold">Rp. <span id="ongkir">-</span></span>
                            </p>
                            <p>
                                <span class="font-semibold">Total</span>
                                <span class="font-semibold">Rp.
                                    <span id="total" data-ongkir="{{ $total }}">{{ $total }}</span>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function updateOngkir(slc) {
            const ongkir = document.getElementById('ongkir');
            ongkir.textContent = slc.data-tarif;

            const total = document.getElementById('total');
            total.textContent = parseFloat(total.dataset.ongkir) + parseFloat(slc.value);
        }

        // document.getElementById('placeOrderButton').addEventListener('click', function() {
        //     Swal.fire({
        //         title: 'Success Checkout!',
        //         text: 'Produk Berhasil di Check Out',
        //         icon: 'success',
        //         confirmButtonText: 'OK'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             document.getElementById('addToCartForm').submit();
        //         }
        //     });
        // });
    </script>
@endsection
