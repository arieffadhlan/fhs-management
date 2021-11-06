<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Auth::routes();
Route::view('/', 'welcome');
Route::get('/dashboard', DashboardController::class);
