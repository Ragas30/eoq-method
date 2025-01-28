@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('content')
    <div class="bg-gray-200 p-4">
        <h1>Data Supplier</h1>
    </div>

    <div class="mt-4">
        <div class="flex justify-between">
            <button class="bg-primary px-3 py-1 h-fit rounded text-white font-semibold" onclick="showAddModal()">Add
                Supplier</button>
            <div>
                <label for="limit" class="mr-2">Tampilkan</label>
                <select name="limit" id="limit" class="border border-gray-400 rounded-md px-2 py-1"
                    onchange="updateTable()">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <table class="w-full table-auto mt-4">
            <thead>
                <tr class="bg-gray-100 text-left *:px-4 *:py-2">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Supplier</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Alamat</th>
                    <th class="px-4 py-2">No Telepon</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $supplier)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $supplier->nm_supplier }}</td>
                        <td class="px-4 py-2">{{ $supplier->email }}</td>
                        <td class="px-4 py-2">{{ $supplier->alamat }}</td>
                        <td class="px-4 py-2">{{ $supplier->nohp }}</td>
                        <td class="px-4 py-2">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition"
                                onclick="showEditModal()">
                                Edit
                            </button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Add Supplier Modal --}}
    <dialog id="add" class="absolute top-0 right-0 bottom-0 left-0 over rounded-xl shadow-sm">
        <div class="flex flex-col items-center w-96 p-4 rounded-xl">
            <h2>Add Supplier</h2>
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

    {{-- Edit Product Modal --}}
    <dialog id="edit" class="absolute top-0 right-0 bottom-0 left-0">
        <div class="flex flex-col items-center w-96 p-4 border border-black rounded-xl">
            <h2>Edit Supplier</h2>
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

    <script>
        function showEditModal() {
            const modal = document.querySelector("#edit");
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
