@extends('components.users.header')

@section('title', 'Status Pesanan')

@section('content')
    <main class="min-h-screen">
        <div class="container mx-auto mt-8 p-4">
            <h1 class="text-2xl font-bold mb-4">Status Pesanan</h1>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <ul class="divide-y divide-gray-200">
                    @foreach ($order as $item)
                        <li class="py-4 flex">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">
                                    Pesanan {{ $loop->iteration }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    Dibuat pada {{ $item->tgl_pesan }}
                                </p>
                            </div>
                            <div class="flex-1 text-right">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">
                                    {{ $item->status }}
                                </span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>

@endsection
