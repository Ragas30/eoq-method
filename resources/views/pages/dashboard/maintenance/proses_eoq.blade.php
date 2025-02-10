@extends('layout.layout_dashboard')

@section('title', 'Maintenance | TOKO BANGUNAN ONE')

@section('heading', 'Persediaan Economic Order Quantity')

@section('content')
    <div class="flex border p-4">
        <div class="w-full">
            <h2 class="font-semibold">Hitung Persediaan EOQ</h2>
            <form action="#" method="POST"
                class="flex justify-between gap-8 w-full *:w-full *:grid *:grid-cols-2 *:gap-x-1 *:gap-y-2">
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
    </div>

    <div class="p-4 mt-4 border">
        <h2>Persediaan EOQ</h2>
        <table class="w-full table-auto mt-4">
            <thead class="text-center">
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Kode Produk</th>
                    <th class="px-4 py-2">Nama Produk</th>
                    <th class="px-4 py-2">Biaya Pesan</th>
                    <th class="px-4 py-2">Biaya Simpan</th>
                    <th class="px-4 py-2">Stok Cadangan</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                </tr>
                <tr>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                </tr>
                <tr>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                </tr>
                <tr>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                    <td>Dummy</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
