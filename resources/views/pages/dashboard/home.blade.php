@extends('layout.layout_dashboard')

@section('title', 'Dashboard | Toko Bangunan YD')

@section('content')
    <div class="flex gap-6">
        <div class="flex gap-2 items-center">
            <div class="bg-primary text-white p-3 text-3xl rounded-xl">
                <i class="fa-solid fa-truck-field"></i>
            </div>
            <div>20 Supplier</div>
        </div>
        <div class="flex gap-2 items-center">
            <div class="bg-primary text-white p-3 text-3xl rounded-xl">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
            <div>2340 Product</div>
        </div>
        <div class="flex gap-2 items-center">
            <div class="bg-primary text-white p-3 text-3xl rounded-xl">
                <i class="fa-solid fa-box"></i>
            </div>
            <div>1.522.145 Stock</div>
        </div>
        <div class="flex gap-2 items-center">
            <div class="bg-primary text-white p-3 text-3xl rounded-xl">
                <i class="fa-solid fa-money-bill-transfer"></i>
            </div>
            <div>100.000+ Transactions</div>
        </div>
    </div>
@endsection
