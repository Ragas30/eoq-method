@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('heading', 'Proses EOQ')

@section('content')
    <div class="flex justify-between items-center">
        <div class="item-start">
            <button onclick="showAddModal()"
                class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Proses EOQ</button>
        </div>
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

    <div class="flex justify-center items-center">
        <table class="w-full table-auto mt-4">
            <thead class="text-center">
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Produk</th>
                    <th class="px-4 py-2">Stok</th>
                    <th class="px-4 py-2">Satuan</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>1</td>
                    <td>Produk 1</td>
                    <td>100</td>
                    <td>Unit</td>
                    <td>
                        <a href=""><i class="fas fa-edit"></i></a>
                        <a href="#" onclick="deleteProduct(1)"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                </tr>

            </tbody>
        </table>
    </div>

    <dialog id="add" class="absolute top-0 w-3/4 right-0 bottom-0 left-0">
        <div class="flex flex-col items-start p-4 border border-black rounded-xl">
            <h2 class="mb-6 font-semibold">Perhitungan Economic Order Quantity</h2>
            <form action="#" method="POST" class="flex gap-8 w-full *:w-full *:grid *:grid-cols-2 *:gap-x-1 *:gap-y-2">
                <div>
                    <label for="Kode Produk">Kode Produk</label>
                    <input class="px-1 border border-black rounded" type="text" name="kode_produk"
                        placeholder="Type here...">
                    <label for="Nama Produk">Nama Produk</label>
                    <input class="px-1 border border-black rounded" type="text" name="nama_produk"
                        placeholder="Type here...">
                    <label for="Harga Produk">Harga Produk</label>
                    <input class="px-1 border border-black rounded" type="text" name="harga_produk"
                        placeholder="Type here...">
                    <label for="Lead Time">Lead Time</label>
                    <input class="px-1 border border-black rounded" type="text" name="lead_time"
                        placeholder="Type here...">
                    <label for="Maksimal Terjual">Maksimal Terjual</label>
                    <input class="px-1 border border-black rounded" type="text" name="max_terjual"
                        placeholder="Type here...">
                    <label for="Rata-Rata Terjual">Rata-Rata Terjual</label>
                    <input class="px-1 border border-black rounded" type="text" name="avg_terjual"
                        placeholder="Type here...">
                </div>
                <div>
                    <label for="Jumlah Kebutuhan">Jumlah Kebutuhan</label>
                    <input class="px-1 border border-black rounded" type="text" disabled name="jumlah_kebutuhan"
                        placeholder="This input is disabled">
                    <label for="Biaya Pesanan">Biaya Pesanan</label>
                    <input class="px-1 border border-black rounded" type="text" disabled name="biaya_pesanan"
                        placeholder="This input is disabled">
                    <label for="Biaya Simpanan">Biaya Simpanan</label>
                    <input class="px-1 border border-black rounded" type="text" disabled name="biaya_simpanan"
                        placeholder="This input is disabled">
                    <label for="EOQ">EOQ</label>
                    <input class="px-1 border border-black rounded" type="text" disabled name="eoq"
                        placeholder="This input is disabled">
                    <button type="button" onclick="closeAddModal()" class="bg-accent1 text-primary rounded">Batal</button>
                    <button class="bg-primary text-white rounded">Hitung & Simpan</button>
                </div>
            </form>
        </div>
    </dialog>

    <script>
        function showAddModal() {
            const modal = document.querySelector("#add");
            modal.showModal();
        }

        function closeAddModal() {
            const modal = document.querySelector("#add");
            modal.close();
        }
    </script>


@endsection
