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
use App\Http\Controllers\TransactionController;
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
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::get('penjualan-staff', [PenjualanController::class, 'indexPenjualanStaff'])->name('penjualan-staff');

    // Akun
    Route::get('akun', [UserController::class, 'index'])->name('akun');
    Route::put('akun/edit', [UserController::class, 'update'])->name('akun.update');

    // Transaksi
    Route::prefix('transaksi')->group(function () {
        Route::get('', [TransactionController::class, 'index'])->name('transaksi');
        Route::get('/create', [TransactionController::class, 'create'])->name('transaksi.create');
        Route::post('', [TransactionController::class, 'store'])->name('transaksi.store');
    });
});

Route::prefix('master')->middleware(['admin', 'auth', 'verified'])->group(function () {
    Route::prefix('kategori')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('kategori')->withoutMiddleware('admin');
        Route::get('/create', [CategoryController::class, 'create'])->name('kategori.create');
        Route::post('', [CategoryController::class, 'store'])->name('kategori.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('kategori.edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('kategori.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('kategori.delete');
    });

    Route::prefix('barang')->group(function () {
        Route::get('', [BarangController::class, 'index'])->name('barang')->withoutMiddleware('admin');
        Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
        Route::post('', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
        Route::put('/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('/{id}', [BarangController::class, 'destroy'])->name('barang.delete');
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
    Route::prefix('transaksi-barang')->group(function () {
        Route::get('', [TransactionController::class, 'index'])->name('transaksi-barang');
        Route::get('/{id}/edit', [TransactionController::class, 'edit'])->name('transaksi-barang.edit');
        Route::put('/{id}', [TransactionController::class, 'update'])->name('transaksi-barang.update');
        Route::delete('/{id}', [TransactionController::class, 'destroy'])->name('transaksi-barang.delete');
    });

    Route::prefix('absensi')->group(function () {
        Route::get('', [AbsensiController::class, 'index'])->name('absensi')->withoutMiddleware('admin');
        Route::get('/create', [AbsensiController::class, 'create'])->name('absensi.create');
        Route::post('', [AbsensiController::class, 'store'])->name('absensi.store')->withoutMiddleware('admin');
        Route::get('/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
        Route::put('/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
        Route::delete('/{id}', [AbsensiController::class, 'destroy'])->name('absensi.delete');
    });
});
