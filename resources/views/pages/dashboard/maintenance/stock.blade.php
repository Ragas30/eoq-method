@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('heading', 'Data Stock')

@section('content')
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
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama Produk</th>
                <th class="px-4 py-2">Stok</th>
                <th class="px-4 py-2">Satuan</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody id="productTable">
            <tr>
                <td class="px-4 py-2">1</td>
                <td class="px-4 py-2">Produk A</td>
                <td class="px-4 py-2">10</td>
                <td class="px-4 py-2">pcs</td>
                <td class="px-4 py-2">
                    <a href=""
                        class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Tambah
                        Produk</a>
                </td>
            </tr>

            <tr>
                <td class="px-4 py-2">2</td>
                <td class="px-4 py-2">Produk B</td>
                <td class="px-4 py-2">20</td>
                <td class="px-4 py-2">pcs</td>
                <td class="px-4 py-2">
                    <a href=""
                        class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Tambah
                        Produk</a>
                </td>
            </tr>
        </tbody>
    </table>

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
