<?php

namespace App\Providers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::bind('product', function($value) {
            return Produk::where('kd_produk', $value)->firstOrFail();
        });

        Route::bind("transaction", function($value) {
            return Transaksi::where('id_transaksi', $value)->firstOrFail();
        });
    }
}
