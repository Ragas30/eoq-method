@extends('layout.layout_dashboard')

@section('title', 'Dashboard | TOKO BANGUNAN ONE')

@section('content')
    <div class="flex gap-6">
        <div class="flex gap-2 items-center">
            <div class="bg-primary text-white p-3 text-3xl rounded-xl">
                <i class="fa-solid fa-truck-field"></i>
            </div>
            <div>{{ $supplier }} Supplier</div>
        </div>
        <div class="flex gap-2 items-center">
            <div class="bg-primary text-white p-3 text-3xl rounded-xl">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
            <div>{{ $produk }} Product</div>
        </div>
        <div class="flex gap-2 items-center">
            <div class="bg-primary text-white p-3 text-3xl rounded-xl">
                <i class="fa-solid fa-box"></i>
            </div>
            <div>{{ $stok }} Stock</div>
        </div>
        <div class="flex gap-2 items-center">
            <div class="bg-primary text-white p-3 text-3xl rounded-xl">
                <i class="fa-solid fa-money-bill-transfer"></i>
            </div>
            <div>{{ $transaksi }} Transactions</div>
        </div>
    </div>
@endsection
