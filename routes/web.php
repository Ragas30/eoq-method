<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.user.index');
});


// Dashboard Menu
Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard.home');
    })->name('dashboard.home');

    Route::get('/supplier', function () {
        return view('pages.dashboard.maintenance.supplier');
    })->name('dashboard.maintenance.supplier');

    Route::get('/product', function () {
        return view('pages.dashboard.maintenance.product');
    })->name('dashboard.maintenance.product');

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
