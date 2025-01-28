@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('content')
    <div class="bg-gray-200 p-4 flex justify-between">
        <h1>Data Stock</h1>
        <button class="bg-green-600 px-3 py-1 h-fit rounded text-white font-semibold" onclick="showAddModal()">Add
            Product</button>
    </div>

    <div class="mt-4">
        <div class="flex justify-end">
            <label for="limit" class="mr-2">Tampilkan</label>
            <select name="limit" id="limit" class="border border-gray-400 rounded-md px-2 py-1" onchange="updateTable()">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <table class="w-full table-auto mt-4">
            <thead>
                <tr class="bg-gray-100 text-left *:px-4 *:py-2">
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Stock</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="productTable" class="*:*:px-4 *:*:py-2">
                <tr>
                    <td>1</td>
                    <td>Product 1</td>
                    <td>1000</td>
                    <td>Pcs</td>
                    <td>10.000</td>
                    <td>
                        <button class="bg-yellow-400 w-6 rounded border" onclick="openDetailModal()">
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
                    <td>2</td>
                    <td>Product 2</td>
                    <td>1000</td>
                    <td>Pcs</td>
                    <td>10.000</td>
                    <td>
                        <button class="bg-yellow-400 w-6 rounded border" onclick="openDetailModal()">
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

    {{-- Add Product Modal --}}
    <dialog id="add" class="absolute top-0 right-0 bottom-0 left-0">
        <div class="flex flex-col items-center w-96 p-4 border border-black rounded-xl">
            <h2>Add Product</h2>
            <form
                class="*:flex *:flex-col *:w-full flex flex-col gap-2 items-center w-80 p-4 border border-black rounded-xl">
                <div>
                    <label for="Product Name">Product Name</label>
                    <input type="text" name="name" placeholder="Type here..." class="border border-black p-1 rounded">
                </div>
                <div>
                    <label for="Product Stock">Product Stock</label>
                    <input type="number" name="stock" placeholder="Type here..." class="border border-black p-1 rounded">
                </div>
                <div>
                    <label for="Product Stock">Product Stock</label>
                    <input type="number" name="stock" placeholder="Type here..." class="border border-black p-1 rounded">
                </div>
                <div>
                    <label for="Product Price">Product Price</label>
                    <input type="number" name="price" placeholder="Type here..." class="border border-black p-1 rounded">
                </div>
                <div>
                    <label for="Product Description">Product Description</label>
                    <input type="text" name="description" placeholder="Type here..."
                        class="border border-black p-1 rounded">
                </div>
                <div>
                    <label for="Product Image">Product Image</label>
                    <input type="file" name="image" class="border border-black p-1 rounded">
                </div>
                <button class="bg-green-600 text-white font-semibold text-center items-center py-1 rounded">
                    Save Product
                </button>
            </form>
        </div>
    </dialog>

    {{-- Detail Product Modal --}}
    <dialog id="detail" class="absolute top-0 right-0 bottom-0 left-0">
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
        function openDetailModal() {
            const modal = document.querySelector("#detail");
            modal.showModal();
        }

        function showAddModal() {
            const modal = document.querySelector("#add");
            modal.showModal();
        }
    </script>

    <script>
        function updateTable() {
            var limit = document.getElementById('limit').value;
            var table = document.getElementById('productTable');
            var rows = table.getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
                if (i < limit) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateTable();
        });
    </script>
@endsection
