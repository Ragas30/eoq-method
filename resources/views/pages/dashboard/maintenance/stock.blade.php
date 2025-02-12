@extends('layout.layout_dashboard')

@section('title', 'Maintenance | TOKO BANGUNAN ONE')

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
            @foreach ($data as $stk)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $stk->nm_produk }}</td>
                    <td class="px-4 py-2">{{ $stk->stok }}</td>
                    <td class="px-4 py-2">{{ $stk->satuan }}</td>
                    <td class="px-4 py-2">
                        <button data-id="{{ $stk->kd_produk }}" onclick="openDialog(this)"
                            class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Tambah
                            Stok</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <dialog id="add" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div
                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div>
                    <h1 class="text-2xl font-bold mb-4">Tambah Stok</h1>
                    <form method="POST" id="add_form">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="stok" class="block font-medium text-gray-700">Stok</label>
                            <select name="id_supplier" id="" class="w-full border border-gray-400 rounded-md px-2 py-1">
                            @foreach ($supplier as $sup)
                                <option value="{{ $sup->id_supplier }}">{{ $sup->nm_supplier }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="stok" class="block font-medium text-gray-700">Jumlah Beli</label>
                            <input type="number" id="stok" name="jml_beli"
                                class="w-full border border-gray-400 rounded-md px-2 py-1">
                        </div>
                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md">
                                Tambah
                            </button>
                            <button type="button"
                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md ml-2"
                                onclick="closeDialog('add')">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </dialog>

    <script>
        function openDialog(btn) {
            var dialog = document.querySelector('#add');
            dialog.showModal();

            const id = btn.getAttribute('data-id');

            const formAction = `stok/${id}`;

            document.querySelector('#add_form').setAttribute('action', formAction);
        }

        function closeDialog(id) {
            var dialog = document.getElementById(id);
            dialog.close();
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
