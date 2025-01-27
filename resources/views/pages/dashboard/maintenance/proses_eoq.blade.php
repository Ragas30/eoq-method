@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('content')
    <div class="bg-gray-200 p-4">
        <h1>Proses EOQ</h1>
    </div>
    <div class="p-6 mt-4 bg-gray-200 rounded-lg shadow-md">
        <form action="" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="tanggal_awal" class="block font-semibold text-gray-700">Tanggal Awal</label>
                <input type="date" name="tanggal_awal" id="tanggal_awal"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <div>
                <label for="tanggal_akhir" class="block font-semibold text-gray-700">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>
            <button type="submit"
                class="w-full py-2 mt-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 ease-in-out">
                Proses
            </button>
        </form>
    </div>
@endsection
