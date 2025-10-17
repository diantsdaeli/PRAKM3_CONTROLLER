<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Halaman login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Halaman dashboard
Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard');
