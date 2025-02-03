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

    <dialog id="add" class="absolute top-0 right-0 bottom-0 left-0">
        <div class="flex flex-col items-start w-96 p-4 border border-black rounded-xl">
            <h2>Create Shipping Rate</h2>
            <form method="POST"
                class="*:flex *:flex-col *:w-full flex flex-col gap-2 items-center w-80 p-4 border border-black rounded-xl">
                @csrf
                <div>
                    <label for="Kode EOQ">Kode EOQ</label>
                    <input type="text" name="kode_eoq" placeholder="Type here..."
                        class="border border-black p-1 rounded">
                    @error('kode_eoq')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="Nama Barang">Nama Barang</label>
                    <input type="text" name="nm_barang" placeholder="Type here..."
                        class="border border-black p-1 rounded">
                    @error('nm_barang')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="Jumlah Hari Kerja">Jumlah Hari Kerja</label>
                    <input type="text" name="jlh_hr_kerja" placeholder="Type here..."
                        class="border border-black p-1 rounded">
                    @error('jlh_hr_kerja')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="Lead Time">Lead Time</label>
                    <input type="text" name="lead_time" placeholder="Type here..."
                        class="border border-black p-1 rounded">
                    @error('lead_time')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="Biaya Penyimpanan">Biaya Penyimpanan</label>
                    <input type="text" name="biaya_penyimpanan" placeholder="Type here..."
                        class="border border-black p-1 rounded">
                    @error('biaya_penyimpanan')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button class="bg-green-600 text-white font-semibold text-center items-center py-1 rounded">
                    Save EOQ
                </button>
            </form>
        </div>
    </dialog>

    <script>
        function showAddModal() {
            const modal = document.querySelector("#add");
            modal.showModal();
        }
    </script>


@endsection
