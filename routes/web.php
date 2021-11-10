<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\DashboardController;

Auth::routes();
Route::view('/', 'welcome');
Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::put('dashboard/edit', [UserController::class, 'update'])->name('user.update');
Route::get('management/stock', [StockController::class, 'index'])->name('stock');
Route::get('management/stock/create', [StockController::class, 'create'])->name('tambah');
Route::post('management/stock/store', [StockController::class, 'store'])->name('stock.store');
