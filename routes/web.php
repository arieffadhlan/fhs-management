<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StockController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('app', 'layouts.app');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/stock', [StockController::class, 'index'])->name('stock');

Route::get('/stock/create', [StockController::class, 'create'])->name('tambah');
Route::post('/stock/store', [StockController::class, 'store'])->name('stock.store');