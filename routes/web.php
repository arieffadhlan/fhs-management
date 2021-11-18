<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;

Auth::routes();
Route::view('/', 'welcome')->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::get('profile', [UserController::class, 'index'])->name('profile');
    Route::put('profile/edit', [UserController::class, 'update'])->name('profile.update');

    Route::get('management/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
    Route::get('management/penjualan/create', [PenjualanController::class, 'create'])->name('penjualanBarang');

    Route::get('management/penjualan/customer', [CustomerController::class, 'index'])->name('pembelianCustomer');
    Route::get('management/customer', [CustomerController::class, 'index2'])->name('dataCustomer');
    Route::get('management/customer/edit/{id}', [CustomerController::class, 'editData'])->name('dataCustomer.edit');
    Route::post('management/customer/update/{id}', [CustomerController::class, 'updateData'])->name('dataCustomer.update');

    Route::post('management/penjualan/customer/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::post('management/penjualan/customer/store2', [CustomerController::class, 'store2'])->name('customer.store2');
    Route::get('management/penjualan/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('management/penjualan/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    
    Route::get('management/stock', [StockController::class, 'index'])->name('stock');
    Route::get('management/stock/create', [StockController::class, 'create'])->name('tambah');
    Route::post('management/stock/store', [StockController::class, 'store'])->name('stock.store');
    Route::get('management/stock/edit/{id}', [StockController::class, 'edit'])->name('stock.edit');
    Route::post('management/stock/update/{id}', [StockController::class, 'update'])->name('stock.update');
    Route::get('management/stock/delete/{id}', [StockController::class, 'destroy'])->name('stock.delete');

    Route::get('management/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
    Route::get('management/penjualan/create', [PenjualanController::class, 'create'])->name('penjualanBarang');
    Route::get('management/penjualan/edit/{id}', [PenjualanController::class, 'editBarang'])->name('penjualanBarang.edit');
    Route::post('management/penjualan/update/{id}', [PenjualanController::class, 'updateBarang'])->name('penjualanBarang.update');
    Route::get('management/penjualan/update/{id}', [PenjualanController::class, 'destroyBarang'])->name('penjualanBarang.delete');
    Route::post('management/penjualan/store2', [PenjualanController::class, 'store2'])->name('penjualan.store');

    Route::get('management/penjualan/staff', [StaffController::class, 'penjualan'])->name('penjualanStaff');
    Route::get('management/penjualan/staff/edit/{id}', [StaffController::class, 'editPenjualan'])->name('penjualanStaff.edit');
    Route::post('management/penjualan/staff/update/{id}', [StaffController::class, 'updatePenjualan'])->name('penjualanStaff.update');
    Route::get('management/penjualan/staff/delete/{id}', [StaffController::class, 'destroyPenjualan'])->name('penjualanStaff.delete');
    Route::post('management/penjualan/staff/store', [StaffController::class, 'storePenjualan'])->name('staff.store');

    Route::get('management/staff', [StaffController::class, 'index'])->name('DataStaff');
    Route::get('management/staff/create', [StaffController::class, 'create'])->name('DataStaff.create');
    Route::post('management/staff/store', [StaffController::class, 'storeStaff'])->name('DataStaff.store');
    Route::get('management/staff/edit/{id}', [StaffController::class, 'editStaff'])->name('DataStaff.edit');
    Route::post('management/staff/update/{id}', [StaffController::class, 'updateStaff'])->name('DataStaff.update');
    Route::get('management/staff/delete/{id}', [StaffController::class, 'destroyStaff'])->name('DataStaff.delete');


    Route::get('absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::get('absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('/admin/add/tambahken', [AbsensiController::class, 'store'])->name('absence.store');
    Route::get('absensi/{id}/edit', [AbsensiController::class, 'edit']);
    Route::put('absensi/{id}/edit', [AbsensiController::class, 'update']);
    Route::delete('absensi/{id}/delete', [AbsensiController::class, 'destroy']);
});
