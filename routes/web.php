<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;

// Form & Proses Login[cite: 1]
Route::get('/', [AuthController::class, 'showLogin']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Route Admin[cite: 1]
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::post('/admin/menu/store', [AdminController::class, 'storeMenu']);
Route::get('/admin/menu/delete/{id}', [AdminController::class, 'deleteMenu']);
Route::post('/admin/pesanan/status/{id}', [AdminController::class, 'updateStatus']);

// Route Siswa[cite: 1]
Route::get('/siswa/dashboard', [SiswaController::class, 'index']);
Route::post('/siswa/pesanan/store', [SiswaController::class, 'storePesanan']);
