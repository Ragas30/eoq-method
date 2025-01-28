@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('heading', 'Data Supplier')

@section('content')
    <div class="flex justify-between">
        <button class="bg-primary px-3 py-1 h-fit rounded text-white font-semibold" onclick="showAddModal()">Add
            Supplier</button>
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
            @foreach ($data as $index => $supplier)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->index + 1 }}</td>
                    <td class="px-4 py-2">{{ $supplier->nm_supplier }}</td>
                    <td class="px-4 py-2">{{ $supplier->email }}</td>
                    <td class="px-4 py-2">{{ $supplier->alamat }}</td>
                    <td class="px-4 py-2">{{ $supplier->nohp }}</td>
                    <td class="px-4 py-2">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition"
                            onclick="showEditModal(this)" data-json='{{ $supplier }}'>
                            Edit
                        </button>
                        <form action="{{ route('supplier.destroy', $supplier->id_supplier) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="ml-2 bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition"
                                onclick="return confirm('Are you sure you want to delete this data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}

    {{-- Add Supplier Modal --}}
    <dialog id="add" class="absolute top-0 right-0 bottom-0 left-0 over rounded-xl shadow-sm">
        <div class="flex flex-col items-center w-96 p-4 rounded-xl">
            <h2>Add Supplier</h2>
            <form method="POST" action="{{ route('supplier.store') }}"
                class="*:flex *:flex-col *:w-full flex flex-col gap-2 items-center w-80 p-4 border border-black rounded-xl">
                @csrf
                <div>
                    <label for="Supplier Name">Supplier Name</label>
                    <input type="text" name="nm_supplier" placeholder="Type here..."
                        class="border border-black p-1 rounded">
                </div>
                <div>
                    <label for="Supplier Address">Supplier Address</label>
                    <textarea name="alamat" placeholder="Type here..." class="border border-black p-1 rounded"></textarea>
                </div>
                <div>
                    <label for="Supplier Email">Supplier Email</label>
                    <input type="email" name="email" placeholder="Type here..." class="border border-black p-1 rounded">
                </div>
                <div>
                    <label for="Supplier Phone Number">Supplier Phone Number</label>
                    <input type="text" name="nohp" placeholder="Type here..." class="border border-black p-1 rounded">
                </div>
                <button class="bg-green-600 text-white font-semibold text-center items-center py-1 rounded">
                    Save Supplier
                </button>
            </form>
        </div>
    </dialog>

    {{-- Edit Product Modal --}}
    <dialog id="edit" class="absolute top-0 right-0 bottom-0 left-0">
        <div class="flex flex-col items-center w-96 p-4 border border-black rounded-xl">
            <h2>Edit Supplier</h2>
            <form id="edit_form" method="POST"
                class="*:flex *:flex-col *:w-full flex flex-col gap-2 items-center w-80 p-4 border border-black rounded-xl">
                @csrf
                @method('PUT')
                <div>
                    <label for="Supplier Name">Supplier Name</label>
                    <input id="nm_supplier" type="text" name="nm_supplier" placeholder="Type here..."
                        class="border border-black p-1 rounded">
                </div>
                <div>
                    <label for="Supplier Address">Supplier Address</label>
                    <textarea id="alamat" name="alamat" placeholder="Type here..." class="border border-black p-1 rounded"></textarea>
                </div>
                <div>
                    <label for="Supplier Email">Supplier Email</label>
                    <input id="email" type="email" name="email" placeholder="Type here..."
                        class="border border-black p-1 rounded">
                </div>
                <div>
                    <label for="Supplier Phone Number">Supplier Phone Number</label>
                    <input id="nohp" type="text" name="nohp" placeholder="Type here..."
                        class="border border-black p-1 rounded">
                </div>
                <button class="bg-green-600 text-white font-semibold text-center items-center py-1 rounded">
                    Save Supplier
                </button>
            </form>
        </div>
    </dialog>

    <script>
        function showEditModal(btn) {
            const modal = document.querySelector("#edit");
            modal.showModal();

            const jsonData = JSON.parse(btn.getAttribute("data-json"));
            console.log(jsonData);

            const nm_supplier = document.querySelector("#nm_supplier");
            const alamat = document.querySelector("#alamat");
            const email = document.querySelector("#email");
            const nohp = document.querySelector("#nohp");

            nm_supplier.value = jsonData.nm_supplier;
            alamat.innerHTML = jsonData.alamat;
            email.value = jsonData.email;
            nohp.value = jsonData.nohp;

            const formAction = `supplier/${jsonData.id_supplier}`;

            const form = document.querySelector("#edit_form");
            form.setAttribute("action", formAction);
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
