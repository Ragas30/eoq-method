<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.user.index');
})->name('home');

// Login
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Register
Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Menu
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        $supplier = Supplier::count();
        $produk = Produk::count();
        $stok = Produk::sum('stok');
        return view('pages.dashboard.home', compact('supplier', 'produk', 'stok'));
    })->name('dashboard.home');

    Route::resource('supplier', SupplierController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::resource('products', ProdukController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::get('/stock', function () {
        return view('pages.dashboard.maintenance.stock');
    })->name('dashboard.maintenance.stock');

    Route::resource('ongkir', OngkirController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::resource('users', UserController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::get('/proses-eoq', function () {
        return view('pages.dashboard.maintenance.proses_eoq');
    })->name('dashboard.maintenance.proses_eoq');

    Route::resource('transactions', TransaksiController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::get('/daily-report', function () {
        return view('pages.dashboard.report.daily');
    })->name('dashboard.report.daily');

    Route::get('/monthly-report', function () {
        return view('pages.dashboard.report.monthly');
    })->name('dashboard.report.monthly');

    Route::get('/yearly-report', function () {
        return view('pages.dashboard.report.yearly');
    })->name('dashboard.report.yearly');
});

// Users Menu
Route::get('/product-menu', function () {
    return view('pages.user.product');
})->name('product_menu');

Route::get('/detail_product', function () {
    return view('pages.user.detail_product');
})->name('detail_product');

Route::get('/cart', function () {
    return view('pages.user.keranjang');
})->name('cart');

Route::get('/check-out', function () {
    return view('pages.user.check_out');
})->name('checl_out');

Route::get('/order', function () {
    return view('pages.user.status_pesan');
})->name('order');
