<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('app', 'layouts.app');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
