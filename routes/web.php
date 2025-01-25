<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.user.index');
});


Route::get('/dashboard', function () {
    return view('pages.dashboard.home');
});
