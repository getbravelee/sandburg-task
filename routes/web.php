<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/coupang-best', function () {
    return view('coupangBest');
})->name('coupang-best'); 

// use App\Http\Controllers\CoupangBestController;

// Route::get('/coupang-best', [CoupangBestController::class, 'index'])->name('coupang-best');
