@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('content')
    <div class="bg-gray-200 p-4">
        <h1>Shipping Rate</h1>
    </div>

    <div class="mt-4">
        <div class="flex justify-start mb-4">
            <a href="" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Add New</a>
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
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $ongkir->daerah }}</td>
                        <td class="px-4 py-2 border">Rp. {{ number_format($ongkir->tarif, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 border">
                            <a href=""
                                class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">Edit</a>
                            <form action="{{ route('ongkir.destroy', $ongkir->id_tempat) }}" method="POST"
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
    </div>
@endsection
