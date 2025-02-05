@extends('components.users.header')

@section('title', 'Check Out')

@section('content')
    <main class="min-h-screen mt-12 p-8 bg-gray-100 flex flex-col gap-8 *:mx-96">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Checkout</h2>
        <form action="" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-lg">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-lg font-semibold text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" id="name"
                        class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="email" class="block text-lg font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                        class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
            </div>
            <div>
                <label for="address" class="block text-lg font-semibold text-gray-700">Alamat Pengiriman</label>
                <textarea name="address" id="address"
                    class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                    rows="4" required></textarea>
            </div>
            <div>
                <label for="payment-method" class="block text-lg font-semibold text-gray-700">Metode Pembayaran</label>
                <select name="payment_method" id="payment-method"
                    class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="credit_card">Kartu Kredit</option>
                    <option value="bank_transfer">Transfer Bank</option>
                    <option value="cash_on_delivery">Bayar di Tempat</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button id="placeOrderButton" type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-md">Place
                    Order</button>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('placeOrderButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Success Checkout!',
                text: 'Produk Berhasil di Check Out',
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
