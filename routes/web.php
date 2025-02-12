<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EoqController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $produk = Produk::take(12)->get();
    return view('pages.user.index', compact('produk'));
})->name('home');

Route::get('/about',[AboutController::class, 'index'])->name('about');

// Login
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Register
Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Menu
Route::prefix('dashboard')->middleware(['auth', 'role:admin,pimpinan'])->group(function () {
    Route::get('/', function () {
        $supplier = Supplier::count();
        $produk = Produk::count();
        $stok = Produk::sum('stok');
        $transaksi = Transaksi::count();
        return view('pages.dashboard.home', compact('supplier', 'produk', 'stok', 'transaksi'));
    })->name('dashboard.home');

    Route::resource('supplier', SupplierController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::resource('products', ProdukController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::get('/stok', [StokController::class, 'index'])->name('stok.index');
    Route::put('/stok/{kd_produk}', [StokController::class, 'update'])->name('stok.update');

    Route::resource('ongkir', OngkirController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::resource('users', UserController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    // Route::get('/proses-eoq', function () {
    //     return view('pages.dashboard.maintenance.proses_eoq');
    // })->name('dashboard.maintenance.proses_eoq');

    Route::get("/proses-eoq", [EoqController::class, 'index'])->name('dashboard.maintenance.proses_eoq');

    Route::resource('transactions', TransaksiController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::get('/daily-report', [LaporanController::class, 'daily'])->name('dashboard.report.daily');

    Route::get('/monthly-report', [LaporanController::class, 'monthly'])->name('dashboard.report.monthly');

    Route::get('/yearly-report', [LaporanController::class, 'yearly'])->name('dashboard.report.yearly');

    Route::get('/print/eoq', function () {
        return view('pages.dashboard.print.eoq');
    })->name('dashboard.print.eoq');

    // Route::get('/print/{kd_pesanan}/nota-pesanan', function () {
    //     return view('pages.dashboard.print.nota_pesanan');
    // })->name('dashboard.print.nota_pesanan');

    Route::get('/print/{id_transaksi}/nota-pesanan', [FakturController::class, 'index'])->name('dashboard.print.nota_pesanan');

    Route::get('/print/{id_pesan}/faktur-barang-masuk/{kd_produk}', [FakturController::class, 'pemesanan'])
    ->name('dashboard.print.faktur-barang-masuk');
});

// Users Menu
Route::get('/product-menu', function () {
    $produk = Produk::all();
    return view('pages.user.product', compact('produk'));
})->name('product_menu');

Route::get('/detail_product/{kd_produk}', function ($kd_produk) {
    $produk = Produk::findOrFail($kd_produk);
    return view('pages.user.detail_product', compact('produk'));
})->name('detail_product');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [KeranjangController::class, 'index'])->name('cart');
    Route::post('/cart/{kd_produk}', [KeranjangController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{kd_produk}', [KeranjangController::class, 'destroy'])->name('cart.destroy');

    Route::get('/check-out', [CheckoutController::class, 'index'])->name('check_out');
    Route::post('/check-out', [CheckoutController::class, 'process'])->name('check_out_post');

    Route::get('/order', function () {
        $order = Transaksi::where('id_pelanggan', Auth::user()->pelanggan->id_pelanggan)->get();
        return view('pages.user.status_pesan', compact('order'));
    })->name('order');
});
