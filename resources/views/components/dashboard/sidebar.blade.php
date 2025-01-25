<aside class="bg-primary p-4 pr-6 flex flex-col justify-between gap-6 text-slate-50">
    <span class="font-bold text-2xl">Toko Bangunan YD</span>
    <ul class="flex-grow">
        <a href="{{ route('dashboard.home') }}">
            <li class="{{ Route::is('dashboard.home') ? $isRoute : $isNotRoute }}">
                Dashboard
            </li>
        </a>
        <li class="mt-5">Maintenance</li>
        <hr class="mb-2">
        <ul class="flex flex-col gap-1 px-3">
            <a href="{{ route('dashboard.maintenance.supplier') }}">
                <li class="{{ Route::is('dashboard.maintenance.supplier') ? $isRoute : $isNotRoute }}">
                    Supplier
                </li>
            </a>
            <a href="{{ route('dashboard.maintenance.product') }}">
                <li class="{{ Route::is('dashboard.maintenance.product') ? $isRoute : $isNotRoute }}">
                    Product
                </li>
            </a>
            <a href="{{ route('dashboard.maintenance.stock') }}">
                <li class="{{ Route::is('dashboard.maintenance.stock') ? $isRoute : $isNotRoute }}">
                    Stock
                </li>
            </a>
            <a href="{{ route('dashboard.maintenance.shipping_rate') }}">
                <li class="{{ Route::is('dashboard.maintenance.shipping_rate') ? $isRoute : $isNotRoute }}">
                    Shipping Rate
                </li>
            </a>
            <a href="{{ route('dashboard.maintenance.users') }}">
                <li class="{{ Route::is('dashboard.maintenance.users') ? $isRoute : $isNotRoute }}">
                    Users
                </li>
            </a>
            <a href="{{ route('dashboard.maintenance.transactions') }}">
                <li class="{{ Route::is('dashboard.maintenance.transactions') ? $isRoute : $isNotRoute }}">
                    Transactions
                </li>
            </a>
        </ul>
        <li class="mt-5">Report</li>
        <hr class="mb-2">
        <ul class="flex flex-col gap-1 px-3">
            <a href="{{ route('dashboard.report.daily') }}">
                <li class="{{ Route::is('dashboard.report.daily') ? $isRoute : $isNotRoute }}">
                    Daily
                </li>
            </a>
            <a href="{{ route('dashboard.report.monthly') }}">
                <li class="{{ Route::is('dashboard.report.monthly') ? $isRoute : $isNotRoute }}">
                    Monthly
                </li>
            </a>
            <a href="{{ route('dashboard.report.yearly') }}">
                <li class="{{ Route::is('dashboard.report.yearly') ? $isRoute : $isNotRoute }}">
                    Yearly
                </li>
            </a>
        </ul>
    </ul>
    <a href="#">LOGOUT</a>
</aside>
