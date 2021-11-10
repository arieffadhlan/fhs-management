<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;

Auth::routes();
Route::view('/', 'welcome');
Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::put('dashboard/edit', [UserController::class, 'update'])->name('user.update');
Route::get('management/stock', [StockController::class, 'index'])->name('stock');
Route::get('management/stock/create', [StockController::class, 'create'])->name('tambah');
Route::post('management/stock/store', [StockController::class, 'store'])->name('stock.store');

Route::get('management/absence', [AbsenceController::class, 'index'])->name('absence');
Route::get('/admin', [AbsenceController::class, 'index']);
Route::get('/admin/create', [AbsenceController::class, 'create']);
Route::post('/admin/add/tambahken', [AbsenceController::class, 'store']);
Route::get('/admin/{id}/edit', [AbsenceController::class, 'edit']);
Route::put('/admin/{id}/apdetin', [AbsenceController::class, 'update']);
Route::delete('/admin/{id}/hapus', [AbsenceController::class, 'destroy']);

Route::get('management/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
Route::get('management/penjualan/create', [PenjualanController::class, 'create'])->name('penjualanBarang');