@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('content')

    <div class="bg-slate-200 w-full px-3 py-1">
        <h1 class="text-xl font-bold mb-8">Products</h1>
        <table class="w-full">
            <thead class="*:border *:border-b-black">
                <th>Product Name</th>
                <th>Stock</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Action</th>
            </thead>
            <tbody class="*:text-center *:border *:border-b-black">
                <tr>
                    <td>Product 1</td>
                    <td>1000</td>
                    <td>Pcs</td>
                    <td>10.000</td>
                    <td>
                        <button class="bg-yellow-400 w-6 rounded border" onclick="openModal()">
                            <i class="fa-solid fa-info"></i>
                        </button>
                        <button class="bg-green-500 w-6 rounded border">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="bg-red-600 w-6 rounded border">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>2400</td>
                    <td>Pcs</td>
                    <td>26.000</td>
                    <td>
                        <button class="bg-yellow-400 w-6 rounded border" onclick="openModal()">
                            <i class="fa-solid fa-info"></i>
                        </button>
                        <button class="bg-green-500 w-6 rounded border">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="bg-red-600 w-6 rounded border">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <dialog class="absolute top-0 right-0 bottom-0 left-0">
        <div class="flex flex-col items-center w-96 p-4 border border-black rounded-xl">
            <img src="https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM="
                alt="Product Image" class="h-48 w-48">
            <span>Product 1</span>
            <span>Stok 1</span>
            <span>Pcs</span>
            <span>10.000</span>
            <span>10.000</span>
            <span>Description</span>
            <span>Lead Time</span>
            <span>B Pesan</span>
            <span>B Simpan</span>
            <span>Stok Cadangan</span>
        </div>
    </dialog>

    <script>
        function openModal() {
            const modal = document.querySelector("dialog");
            modal.showModal();
        }
    </script>
@endsection
