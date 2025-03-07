<aside class="bg-primary p-4 pr-6 flex flex-col justify-between gap-6 text-slate-50">
    <span class="font-bold text-2xl">TOKO BANGUNAN ONE</span>
    <ul class="flex-grow">
        <a href="{{ route('dashboard.home') }}">
            <li class="{{ Route::is('dashboard.home') ? $isRoute : $isNotRoute }}">
                <i class="fa-solid fa-gauge"></i>Dashboard
            </li>
        </a>
        {{-- <li class="mt-5">
            <button class="w-full flex justify-between" onclick="openMenu('maintenance')">
                <span>Maintenance</span>
                <i class="fa-solid fa-caret-down"></i>
            </button>
        </li> --}}
        <a href="{{ route('supplier.index') }}">
            <li class="{{ Route::is('supplier.index') ? $isRoute : $isNotRoute }}">
                <i class="fa-solid fa-truck-field"></i>Kelola Supplier
            </li>
        </a>
        <a href="{{ route('products.index') }}">
            <li class="{{ Route::is('products.index') ? $isRoute : $isNotRoute }}">
                <i class="fa-solid fa-boxes-stacked"></i>Kelola Product
            </li>
        </a>
        <a href="{{ route('stok.index') }}">
            <li class="{{ Route::is('stok.index') ? $isRoute : $isNotRoute }}">
                <i class="fa-solid fa-box"></i>Kelola Stock Product
            </li>
        </a>
        <a href="{{ route('dashboard.maintenance.proses_eoq') }}">
            <li class="{{ Route::is('dashboard.maintenance.proses_eoq') ? $isRoute : $isNotRoute }}">
                <i class="fa fa-spinner"></i>Proses Eoq
            </li>
        </a>
        <a href="{{ route('ongkir.index') }}">
            <li class="{{ Route::is('ongkir.index') ? $isRoute : $isNotRoute }}">
                <i class="fa-regular fa-paper-plane"></i>Kelola Tarif Kirim
            </li>
        </a>
        <a href="{{ route('users.index') }}">
            <li class="{{ Route::is('dashboard.maintenance.users') ? $isRoute : $isNotRoute }}">
                <i class="fa-solid fa-users"></i>Kelola Users
            </li>
        </a>
        {{-- <a href="{{ route('produk_masuk') }}">
            <li class="{{ Route::is('produk_masuk') ? $isRoute : $isNotRoute }}">
                <i class="fa-solid fa-inbox"></i>Kelola Produk Masuk
            </li>
        </a> --}}
        <a href="{{ route('transactions.index') }}">
            <li class="{{ Route::is('transactions.index') ? $isRoute : $isNotRoute }}">
                <i class="fa-solid fa-money-bill-transfer"></i>Transactions
            </li>
        </a>
        {{-- <a href="{{ route('transactions.index') }}">
            <li class="{{ Route::is('transactions.index') ? $isRoute : $isNotRoute }}">
                <i class="fa-solid fa-file-alt"></i>Kelola Laporan Stok EOQ
            </li>
        </a> --}}
        <li class="mt-5">
            <button class="w-full flex justify-between" onclick="openMenu('report')">
                <span>Report</span>
                <i class="fa-solid fa-caret-down"></i>
            </button>
        </li>
        <hr class="mb-2">
        <ul class="hidden flex-col gap-1 px-3" id="report">
            <a href="{{ route('dashboard.report.daily') }}">
                <li class="{{ Route::is('dashboard.report.daily') ? $isRoute : $isNotRoute }}">
                    <i class="fa-solid fa-calendar-days"></i>Daily
                </li>
            </a>
            <a href="{{ route('dashboard.report.monthly') }}">
                <li class="{{ Route::is('dashboard.report.monthly') ? $isRoute : $isNotRoute }}">
                    <i class="fa-solid fa-calendar-days"></i>Monthly
                </li>
            </a>
            <a href="{{ route('dashboard.report.yearly') }}">
                <li class="{{ Route::is('dashboard.report.yearly') ? $isRoute : $isNotRoute }}">
                    <i class="fa-solid fa-calendar-days"></i>Yearly
                </li>
            </a>

        </ul>
    </ul>
    <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="flex gap-2 items-center bg-transparent border-none cursor-pointer">
            <i class="fa-solid fa-door-open hidden group-hover:block"></i>LOGOUT
        </button>
    </form>
</aside>

<script>
    let isOpen = false;

    function openMenu(title) {
        const report = document.querySelector('#report');
        if (title == 'report') {
            report.classList.toggle('hidden');
            report.classList.toggle('flex');
            isOpen = !isOpen;
        }
    }
</script>
