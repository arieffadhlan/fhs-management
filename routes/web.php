<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;

Auth::routes();
Route::view('/', 'welcome');
Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::get('profile', [UserController::class, 'index'])->name('profile');
Route::put('profile/edit', [UserController::class, 'update'])->name('profile.update');

Route::get('management/stock', [StockController::class, 'index'])->name('stock');
Route::get('management/stock/create', [StockController::class, 'create'])->name('tambah');
Route::post('management/stock/store', [StockController::class, 'store'])->name('stock.store');
Route::get('management/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
Route::get('management/penjualan/create', [PenjualanController::class, 'create'])->name('penjualanBarang');
Route::post('management/penjualan/store2', [PenjualanController::class, 'store2'])->name('penjualan.store');

Route::get('absensi', [AbsensiController::class, 'index'])->name('absensi');
Route::get('absensi/create', [AbsensiController::class, 'create']);
Route::post('absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('absensi/{id}/edit', [AbsensiController::class, 'edit']);
Route::put('absensi/{id}/edit', [AbsensiController::class, 'update']);
Route::delete('absensi/{id}/delete', [AbsensiController::class, 'destroy']);
