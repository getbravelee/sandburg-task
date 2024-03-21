<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CrawledDataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/coupang-best', function () {
    return view('coupangBest');
})->name('coupang-best'); 

Route::get('/coupang-best', [CrawledDataController::class, 'fetchData'])->name('coupang-best');