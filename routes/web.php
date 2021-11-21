<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\PenjualanController;

Auth::routes();

Route::middleware('guest')->group(function () {
    Route::view('/', 'welcome')->middleware('guest');
    Route::get('/reset-password', [LupaPasswordController::class, 'index'])->name('resetPassword');
    Route::put('/reset-password/edit', [LupaPasswordController::class, 'update'])->name('resetPassword.update');
});

// Route::group(['middleware' => ['admin', 'auth']], function () {
// });

Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::get('profile', [UserController::class, 'index'])->name('profile');
    Route::put('profile/edit', [UserController::class, 'update'])->name('profile.update');

    Route::get('management/stock', [StockController::class, 'index'])->name('stock');
    Route::get('management/stock/create', [StockController::class, 'create'])->name('stock.create');
    Route::post('management/stock/store', [StockController::class, 'store'])->name('stock.store');
    Route::get('management/stock/{id}/edit', [StockController::class, 'edit'])->name('stock.edit');
    Route::put('management/stock/{id}/edit', [StockController::class, 'update'])->name('stock.update');
    Route::delete('management/stock/{id}/delete', [StockController::class, 'destroy']);

    Route::get('management/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
    Route::get('management/penjualan/create', [PenjualanController::class, 'create'])->name('penjualanBarang.create');
    Route::post('management/penjualan/store', [PenjualanController::class, 'store'])->name('penjualanBarang.store');
    Route::get('management/penjualan/{id}/edit', [PenjualanController::class, 'edit'])->name('penjualanBarang.edit');
    Route::put('management/penjualan/{id}/edit', [PenjualanController::class, 'update'])->name('penjualanBarang.update');
    Route::delete('management/penjualan/{id}/delete', [PenjualanController::class, 'destroy'])->name('penjualanBarang.delete');

    Route::get('management/penjualan/customer/create', [PenjualanController::class, 'createCustomer'])->name('pembelianCustomer.create');
    Route::post('management/penjualan/customer/store', [PenjualanController::class, 'storeCustomer'])->name('pembelianCustomer.store');
    Route::get('management/penjualan/customer/{id}/edit', [PenjualanController::class, 'editCustomer'])->name('pembelianCustomer.edit');
    Route::put('management/penjualan/customer/{id}/edit', [PenjualanController::class, 'updateCustomer'])->name('pembelianCustomer.update');

    Route::get('management/penjualan/staff/create', [PenjualanController::class, 'createStaff'])->name('penjualanStaff.create');
    Route::post('management/penjualan/staff/store', [PenjualanController::class, 'storeStaff'])->name('penjualanStaff.store');
    Route::get('management/penjualan/staff/{id}/edit', [PenjualanController::class, 'editStaff'])->name('penjualanStaff.edit');
    Route::put('management/penjualan/staff/{id}/edit', [PenjualanController::class, 'updateStaff'])->name('penjualanStaff.update');
    Route::delete('management/penjualan/staff/{id}/delete', [PenjualanController::class, 'destroyStaff'])->name('penjualanStaff.delete');

    Route::get('management/staff', [StaffController::class, 'index'])->name('DataStaff');
    Route::get('management/staff/create', [StaffController::class, 'create'])->name('DataStaff.create');
    Route::post('management/staff/store', [StaffController::class, 'store'])->name('DataStaff.store');
    Route::get('management/staff/{id}/edit', [StaffController::class, 'edit'])->name('DataStaff.edit');
    Route::put('management/staff/{id}/edit', [StaffController::class, 'update'])->name('DataStaff.update');
    Route::delete('management/staff/{id}/delete', [StaffController::class, 'destroy'])->name('DataStaff.delete');

    Route::get('management/customer', [CustomerController::class, 'index'])->name('dataCustomer');
    Route::get('management/customer/create', [CustomerController::class, 'create'])->name('dataCustomer.create');
    Route::post('management/customer/store', [CustomerController::class, 'store'])->name('dataCustomer.store');
    Route::get('management/customer/{id}/edit', [CustomerController::class, 'edit'])->name('dataCustomer.edit');
    Route::put('management/customer/{id}/edit', [CustomerController::class, 'update'])->name('dataCustomer.update');
    Route::put('management/customer/{id}/delete', [CustomerController::class, 'delete'])->name('dataCustomer.delete');

    Route::get('absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::post('absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('absensi/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::put('absensi/{id}/edit', [AbsensiController::class, 'update'])->name('absensi.update');
    Route::delete('absensi/{id}/delete', [AbsensiController::class, 'destroy'])->name('absensi.delete');
});
