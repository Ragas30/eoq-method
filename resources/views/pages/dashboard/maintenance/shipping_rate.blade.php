@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('heading', 'Shipping Rate')

@section('content')
    <div class="flex justify-start mb-4">
        <button onclick="showAddModal()" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Add
            New</button>
    </div>
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-300">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Daerah</th>
                <th class="px-4 py-2">Tarif</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $ongkir)
                <tr>
                    <td class="px-4 py-2 border">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->index + 1 }}</td>
                    <td class="px-4 py-2 border">{{ $ongkir->daerah }}</td>
                    <td class="px-4 py-2 border">Rp. {{ number_format($ongkir->tarif, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border">
                        <button onclick="showEditModal(this)"
                            class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition"
                            data-json='{{ $ongkir }}'>Edit</button>
                        <form action="{{ route('ongkir.destroy', $ongkir->id_tempat) }}" method="POST" class="inline">
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

    {{-- Add Product Modal --}}
    <dialog id="add" class="absolute top-0 right-0 bottom-0 left-0">
        <div class="flex flex-col items-center w-96 p-4 border border-black rounded-xl">
            <h2>Create kasujhgdauik</h2>
            <form method="POST" action="{{ route('ongkir.store') }}"
                class="*:flex *:flex-col *:w-full flex flex-col gap-2 items-center w-80 p-4 border border-black rounded-xl">
                @csrf
                <div>
                    <label for="Daerah">Daerah</label>
                    <input type="text" name="daerah" placeholder="Type here..." class="border border-black p-1 rounded">
                </div>
                <div>
                    <label for="Tarif">Tarif</label>
                    <input type="text" name="tarif" placeholder="Type here..." class="border border-black p-1 rounded">
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
            <h2>Edit kasujhgdauik</h2>
            <form id="edit_form" method="POST"
                class="*:flex *:flex-col *:w-full flex flex-col gap-2 items-center w-80 p-4 border border-black rounded-xl">
                @csrf
                @method('PUT')
                <div>
                    <label for="Daerah">Daerah</label>
                    <input type="text" id="daerah" name="daerah" placeholder="Type here..."
                        class="border border-black p-1 rounded">
                </div>
                <div>
                    <label for="Tarif">Tarif</label>
                    <input type="text" id="tarif" name="tarif" placeholder="Type here..."
                        class="border border-black p-1 rounded">
                </div>
                <button class="bg-green-600 text-white font-semibold text-center items-center py-1 rounded">
                    Save Product
                </button>
            </form>
        </div>
    </dialog>

    <script>
        function showAddModal() {
            const modal = document.querySelector("#add");
            modal.showModal();
        }

        function showEditModal(btn) {
            const modal = document.querySelector("#edit");
            modal.showModal();
            const jsonData = JSON.parse(btn.getAttribute("data-json"));
            console.log(jsonData)

            const daerah = modal.querySelector("#daerah");
            const tarif = modal.querySelector("#tarif");

            daerah.value = jsonData.daerah;
            tarif.value = jsonData.tarif;

            console.log(jsonData.id_tempat)
            // Menyesuaikan action form berdasarkan id_tempat
            const formAction = `ongkir/${jsonData.id_tempat}`;

            const form = document.querySelector("#edit_form");
            form.setAttribute("action", formAction);
        }
    </script>

@endsection
