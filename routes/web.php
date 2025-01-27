<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
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
        return view('pages.dashboard.home');
    })->name('dashboard.home');

    Route::get('/supplier', function () {
        return view('pages.dashboard.maintenance.supplier');
    })->name('dashboard.maintenance.supplier');

    Route::resource('products', ProdukController::class);

    Route::get('/stock', function () {
        return view('pages.dashboard.maintenance.stock');
    })->name('dashboard.maintenance.stock');

    Route::get('/shipping-rate', function () {
        return view('pages.dashboard.maintenance.shipping_rate');
    })->name('dashboard.maintenance.shipping_rate');

    Route::get('/users', function () {
        return view('pages.dashboard.maintenance.users');
    })->name('dashboard.maintenance.users');

    Route::get('/transactions', function () {
        return view('pages.dashboard.maintenance.transactions');
    })->name('dashboard.maintenance.transactions');

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
