@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('heading', 'Data Produk')

@section('content')
    <div class="flex justify-between">
        <button class="bg-primary px-3 py-1 h-fit rounded text-white font-semibold" onclick="showAddModal()">Add
            Product</button>
        <div>
            <label for="limit" class="mr-2">Tampilkan</label>
            <select name="limit" id="limit" class="border border-gray-400 rounded-md px-2 py-1" onchange="updateTable()">
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
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Kode Produk</th>
                <th class="px-4 py-2">Nama Produk</th>
                <th class="px-4 py-2">Gambar</th>
                <th class="px-4 py-2">Stok</th>
                <th class="px-4 py-2">Harga Jual</th>
                <th class="px-4 py-2">Harga Beli</th>
                <th class="px-4 py-2">Lead Time</th>
                <th class="px-4 py-2">Biaya Pesan</th>
                <th class="px-4 py-2">Biaya Simpan</th>
                {{-- <th class="px-4 py-2">Stok Cadangan</th> --}}
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody id="productTable">
            @foreach ($data as $prd)
                <tr>
                    <td class="px-4 py-2">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->index + 1 }}</td>
                    <td class="px-4 py-2">{{ $prd->kd_produk }}</td>
                    <td class="px-4 py-2">{{ $prd->nm_produk }}</td>
                    <td class="px-4 py-2"><img src="../{{ $prd->gambar }}" alt="" class="w-20 h-20 object-cover">
                    </td>
                    <td class="px-4 py-2">{{ $prd->stok }} {{ $prd->satuan }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($prd->harga, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($prd->harga_beli, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">{{ $prd->lead_time }} hari</td>
                    <td class="px-4 py-2">Rp {{ number_format($prd->b_pesan, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($prd->b_simpan, 0, ',', '.') }}</td>
                    {{-- <td class="px-4 py-2">{{ $prd->stok_cadangan }}</td> --}}
                    <td class="px-4 py-2">
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition"
                            onclick="openDetailModal()">
                            Detail
                        </button>
                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition"
                            onclick="showEditModal(this)" data-json='{{ $prd }}'>
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
    {{ $data->links() }}

    {{-- IMPORTANT --}}
    {{-- USE THIS CODE FOR EDIT BUTTON AFTER PRODUCT SEEDER IS MADE (INSIDE LOOPING $products) --}}
    {{-- <button class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition" onclick="showEditModal()"
        data-json='{{ $products }}'>
        Edit
    </button> --}}
    {{-- IMPORTANT --}}

    {{-- Add Product Modal --}}
    <dialog id="add" class="absolute top-0 right-0 bottom-0 left-0">
        <div class="flex flex-col items-center p-4 border border-black rounded-xl w-[900px]">
            <h2>Add Product</h2>
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data"
                class="grid grid-cols-2 items-start gap-2 p-4 border border-black rounded-xl">
                @csrf
                <div class="col-span-2">
                    <label for="nm_produk">Kode Produk</label>
                    <input type="text" name="kd_produk" placeholder="Masukkan kode produk"
                        class="border border-black p-1 rounded w-full" required>
                    @error('kd_produk')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="nm_produk">Nama Produk</label>
                    <input type="text" name="nm_produk" placeholder="Masukkan nama produk"
                        class="border border-black p-1 rounded w-full" required>
                    @error('nm_produk')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="stok">Stok Produk</label>
                    <input type="number" name="stok" placeholder="Masukkan stok produk"
                        class="border border-black p-1 rounded w-full" required>
                    @error('stok')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="satuan">Satuan</label>
                    <input type="text" name="satuan" placeholder="Masukkan satuan produk"
                        class="border border-black p-1 rounded w-full" required>
                    @error('satuan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="harga">Harga Jual</label>
                    <input type="number" name="harga" placeholder="Masukkan harga jual"
                        class="border border-black p-1 rounded w-full" required>
                    @error('harga')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="harga_beli">Harga Beli</label>
                    <input type="number" name="harga_beli" placeholder="Masukkan harga beli per satuan"
                        class="border border-black p-1 rounded w-full">
                    @error('harga_beli')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="deskripsi">Deskripsi Produk</label>
                    <textarea name="deskripsi" placeholder="Masukkan deskripsi produk"
                        class="border border-black p-1 rounded w-full resize-none h-72" required>
                    </textarea>
                    @error('deskripsi')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="gambar">Gambar Produk</label>
                    <input type="file" name="gambar" class="border border-black p-1 rounded w-full" required>
                    @error('gambar')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="lead_time">Lead Time</label>
                    <input type="number" name="lead_time" placeholder="Masukkan lead time"
                        class="border border-black p-1 rounded w-full" required>
                    @error('lead_time')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="b_pesan">Biaya Pemesanan</label>
                    <input type="number" name="b_pesan" placeholder="Masukkan lead time"
                        class="border border-black p-1 rounded w-full" required>
                    @error('b_pesan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button
                    class="bg-green-600 text-white font-semibold text-center items-center py-1 rounded col-span-2 w-full">
                    Save Product
                </button>
            </form>
        </div>
    </dialog>


    {{-- Edit Product Modal --}}
    <dialog id="edit" class="absolute top-0 right-0 bottom-0 left-0">
        <div class="flex flex-col items-center w-[900px] p-4 border border-black rounded-xl">
            <h2>Edit Product</h2>
            <form id="edit_form" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-2 items-start gap-2 p-4 border border-black rounded-xl">
                @csrf
                @method('PUT')
                <div class="col-span-2">
                    <label for="nm_produk">Kode Produk</label>
                    <input type="text" name="kd_produk" placeholder="Masukkan kode produk"
                        class="border border-black p-1 rounded w-full" required>
                    @error('kd_produk')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="nm_produk">Nama Produk</label>
                    <input type="text" name="nm_produk" placeholder="Masukkan nama produk"
                        class="border border-black p-1 rounded w-full" required>
                    @error('nm_produk')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="stok">Stok Produk</label>
                    <input type="number" name="stok" placeholder="Masukkan stok produk"
                        class="border border-black p-1 rounded w-full" required>
                    @error('stok')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="satuan">Satuan</label>
                    <input type="text" name="satuan" placeholder="Masukkan satuan produk"
                        class="border border-black p-1 rounded w-full" required>
                    @error('satuan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="harga">Harga Jual</label>
                    <input type="number" name="harga" placeholder="Masukkan harga jual"
                        class="border border-black p-1 rounded w-full" required>
                    @error('harga')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="harga_beli">Harga Beli</label>
                    <input type="number" name="harga_beli" placeholder="Masukkan harga beli per satuan"
                        class="border border-black p-1 rounded w-full">
                    @error('harga_beli')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="deskripsi">Deskripsi Produk</label>
                    <textarea name="deskripsi" placeholder="Masukkan deskripsi produk"
                        class="border border-black p-1 rounded w-full resize-none h-72" required>
                    </textarea>
                    @error('deskripsi')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="gambar">Gambar Produk</label>
                    <input type="file" name="gambar" class="border border-black p-1 rounded w-full" required>
                    @error('gambar')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="lead_time">Lead Time</label>
                    <input type="number" name="lead_time" placeholder="Masukkan lead time"
                        class="border border-black p-1 rounded w-full" required>
                    @error('lead_time')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="b_pesan">Biaya Pemesanan</label>
                    <input type="number" name="b_pesan" placeholder="Masukkan lead time"
                        class="border border-black p-1 rounded w-full" required>
                    @error('b_pesan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button
                    class="bg-green-600 text-white font-semibold text-center items-center py-1 rounded col-span-2 w-full">
                    Save Product
                </button>
            </form>
        </div>
    </dialog>

    {{-- Detail Product Modal --}}
    <dialog id="detail" class="absolute top-0 right-0 bottom-0 left-0">
        <div class="flex flex-col items-center w-96 p-4 border border-black rounded-xl">
            <img src="https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM="
                alt="Gambar Produk" class="h-48 w-48">
            <span id="detail_name">Product 1</span>
            <span id="detail_stock">Stok 1</span>
            <span id="detail_qty">Pcs</span>
            <span id="detail_price">10.000</span>
            <span id="detail_buy_price">10.000</span>
            <span id="detail_description">Description</span>
            <span id="detail_lead_time">Lead Time</span>
            <span id="detail_b_pesan">B Pesan</span>
            <span id="detail_b_simpan">B Simpan</span>
            <span id="detail_stok_cadangan">Stok Cadangan</span>
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

        function showEditModal(btn) {
            const modal = document.querySelector("#edit");
            modal.showModal();

            // UNCOMMENT CODE BELOW AFTER DATA DYNAMIC
            const jsonData = JSON.parse(btn.getAttribute("data-json"));

            const nm_produk = document.querySelector("#nm_produk");
            const stock = document.querySelector("#stock");
            const satuan = document.querySelector("#satuan");
            const harga = document.querySelector("#harga");
            const harga_beli = document.querySelector("#harga_beli");
            const deskripsi = document.querySelector("#deskripsi");
            const lead_time = document.querySelector("#lead_time");
            // const b_simpan = document.querySelector("#b_simpan");
            const b_pesan = document.querySelector("#b_pesan");
            // const stock_cadangan = document.querySelector("#stock_cadangan");

            nm_produk.value = jsonData.nm_produk;
            stock.value = jsonData.stock;
            satuan.value = jsonData.satuan;
            harga.value = jsonData.harga;
            harga_beli.value = jsonData.harga_beli;
            deskripsi.value = jsonData.deskripsi;
            lead_time.value = jsonData.lead_time;
            // b_simpan.value = jsonData.b_simpan;
            b_pesan.value = jsonData.b_pesan;
            // stock_cadangan.value = jsonData.stock_cadangan;

            const formAction = `products/${jsonData.kd_product}`;

            const form = document.querySelector('#edit_form');
            form.setAttribute("action", formAction);
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

        {{ $errors->any() ? 'showAddModal()' : '' }}
        // {{ $errors->any() ? 'showEditModal()' : '' }}

        document.addEventListener('DOMContentLoaded', function() {
            updateTable();
        });
    </script>
@endsection
