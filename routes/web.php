<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\VerificationController;

Auth::routes();
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return Redirect::route('login');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard')->withoutMiddleware('admin');
    Route::get('akun', [UserController::class, 'index'])->name('akun')->withoutMiddleware('admin');
    Route::put('akun/edit', [UserController::class, 'update'])->name('akun.update')->withoutMiddleware('admin');
});

Route::prefix('master')->middleware(['admin', 'auth', 'verified'])->group(function () {
    Route::prefix('barang')->group(function () {
        Route::get('', [BarangController::class, 'index'])->name('barang');
        Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
        Route::post('', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
        Route::put('/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('/{id}', [BarangController::class, 'destroy'])->name('barang.delete');
    });

    Route::prefix('kategori')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('kategori');
        Route::get('/create', [CategoryController::class, 'create'])->name('kategori.create');
        Route::post('', [CategoryController::class, 'store'])->name('kategori.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('kategori.edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('kategori.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('kategori.delete');
    });

    Route::prefix('supplier')->group(function () {
        Route::get('', [SupplierController::class, 'index'])->name('supplier');
        Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
        Route::post('', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::put('/{id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('supplier.delete');
    });

    Route::prefix('customer')->group(function () {
        Route::get('', [CustomerController::class, 'index'])->name('customer');
        Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::put('/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
    });

    Route::prefix('pengguna')->group(function () {
        Route::get('', [PenggunaController::class, 'index'])->name('pengguna');
        Route::get('/create', [PenggunaController::class, 'create'])->name('pengguna.create');
        Route::post('', [PenggunaController::class, 'store'])->name('pengguna.store');
        Route::get('/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
        Route::put('/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
        Route::delete('/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.delete');
    });
});

Route::prefix('laporan')->middleware(['admin', 'auth', 'verified'])->group(function () {
    Route::prefix('absensi')->group(function () {
        Route::get('', [AbsensiController::class, 'index'])->name('absensi');
        Route::get('/create', [AbsensiController::class, 'create'])->name('absensi.create');
        Route::post('', [AbsensiController::class, 'store'])->name('absensi.store');
        Route::get('/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
        Route::put('/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
        Route::delete('/{id}', [AbsensiController::class, 'destroy'])->name('absensi.delete');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('penjualan-staff', [PenjualanController::class, 'indexPenjualanStaff'])->name('penjualan-staff');

    Route::get('absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::post('absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
});

// Route::middleware(['admin', 'auth', 'verified'])->group(function () {
//     // Stok
//     Route::get('management/stock', [StockController::class, 'index'])->name('stock');
//     Route::get('management/stock/create', [StockController::class, 'create'])->name('stock.create');
//     Route::post('management/stock/store', [StockController::class, 'store'])->name('stock.store');
//     Route::get('management/stock/{id}/edit', [StockController::class, 'edit'])->name('stock.edit');
//     Route::put('management/stock/{id}/edit', [StockController::class, 'update'])->name('stock.update');
//     Route::delete('management/stock/{id}/delete', [StockController::class, 'destroy']);

//     // Penjualan
//     Route::get('management/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
//     Route::get('management/penjualan/create', [PenjualanController::class, 'create'])->name('penjualanBarang.create');
//     Route::post('management/penjualan/store', [PenjualanController::class, 'store'])->name('penjualanBarang.store');
//     Route::get('management/penjualan/{id}/edit', [PenjualanController::class, 'edit'])->name('penjualanBarang.edit');
//     Route::put('management/penjualan/{id}/edit', [PenjualanController::class, 'update'])->name('penjualanBarang.update');
//     Route::delete('management/penjualan/{id}/delete', [PenjualanController::class, 'destroy'])->name('penjualanBarang.delete');

//     Route::get('management/penjualan/customer/create', [PenjualanController::class, 'createCustomer'])->name('pembelianCustomer.create');
//     Route::post('management/penjualan/customer/store', [PenjualanController::class, 'storeCustomer'])->name('pembelianCustomer.store');
//     Route::get('management/penjualan/customer/{id}/edit', [PenjualanController::class, 'editCustomer'])->name('pembelianCustomer.edit');
//     Route::put('management/penjualan/customer/{id}/edit', [PenjualanController::class, 'updateCustomer'])->name('pembelianCustomer.update');
//     Route::delete('management/penjualan/customer/{id}/delete', [PenjualanController::class, 'destroyCustomer'])->name('pembelianCustomer.delete');

//     Route::get('management/penjualan/staff/create', [PenjualanController::class, 'createStaff'])->name('penjualanStaff.create');
//     Route::post('management/penjualan/staff/store', [PenjualanController::class, 'storeStaff'])->name('penjualanStaff.store');
//     Route::get('management/penjualan/staff/{id}/edit', [PenjualanController::class, 'editStaff'])->name('penjualanStaff.edit');
//     Route::put('management/penjualan/staff/{id}/edit', [PenjualanController::class, 'updateStaff'])->name('penjualanStaff.update');
//     Route::delete('management/penjualan/staff/{id}/delete', [PenjualanController::class, 'destroyStaff'])->name('penjualanStaff.delete');

//     // Staff
//     Route::get('management/staff', [StaffController::class, 'index'])->name('DataStaff');
//     Route::get('management/staff/create', [StaffController::class, 'create'])->name('DataStaff.create');
//     Route::post('management/staff/store', [StaffController::class, 'store'])->name('DataStaff.store');
//     Route::get('management/staff/{id}/edit', [StaffController::class, 'edit'])->name('DataStaff.edit');
//     Route::put('management/staff/{id}/edit', [StaffController::class, 'update'])->name('DataStaff.update');
//     Route::delete('management/staff/{id}/delete', [StaffController::class, 'destroy'])->name('DataStaff.delete');

//     // Customer
//     Route::get('management/customer', [CustomerController::class, 'index'])->name('dataCustomer');
//     Route::get('management/customer/create', [CustomerController::class, 'create'])->name('dataCustomer.create');
//     Route::post('management/customer/store', [CustomerController::class, 'store'])->name('dataCustomer.store');
//     Route::get('management/customer/{id}/edit', [CustomerController::class, 'edit'])->name('dataCustomer.edit');
//     Route::put('management/customer/{id}/edit', [CustomerController::class, 'update'])->name('dataCustomer.update');
//     Route::put('management/customer/{id}/delete', [CustomerController::class, 'delete'])->name('dataCustomer.delete');

//     // Absensi
//     Route::get('absensi/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
//     Route::put('absensi/{id}/edit', [AbsensiController::class, 'update'])->name('absensi.update');
//     Route::delete('absensi/{id}/delete', [AbsensiController::class, 'destroy'])->name('absensi.delete');
// });
