<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/coupang-best', function () {
    return view('coupangBest');
})->name('coupang-best'); 