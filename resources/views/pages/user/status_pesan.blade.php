@extends('components.users.header')

@section('title', 'Status Pesanan')

@section('content')
    <main class="min-h-screen">
        <div class="container mx-auto mt-8 p-4">
            <h1 class="text-2xl font-bold mb-4">Status Pesanan</h1>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <ul class="divide-y divide-gray-200">
                    <li class="py-4 flex">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">
                                Pesanan 1
                            </p>
                            <p class="text-sm text-gray-600">Nama Barang</p>
                            <p class="text-sm text-gray-600">
                                Dibuat pada 12-12-2022 12:00
                            </p>
                        </div>
                        <div class="flex-1 text-right">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Dikirim
                            </span>
                        </div>
                    </li>
                    <li class="py-4 flex">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">
                                Pesanan 2
                            </p>
                            <p class="text-sm text-gray-600">Nama Barang</p>
                            <p class="text-sm text-gray-600">
                                Dibuat pada 12-12-2022 12:00
                            </p>
                        </div>
                        <div class="flex-1 text-right">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Dalam Proses
                            </span>
                        </div>
                    </li>
                    <li class="py-4 flex">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">
                                Pesanan 3
                            </p>
                            <p class="text-sm text-gray-600">Nama Barang</p>
                            <p class="text-sm text-gray-600">
                                Dibuat pada 12-12-2022 12:00
                            </p>
                        </div>
                        <div class="flex-1 text-right">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Dibatalkan
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>

@endsection
