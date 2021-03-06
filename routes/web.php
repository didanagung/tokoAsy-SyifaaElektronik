<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/barang/{slug}/detail', [AdminController::class, 'show']);
    Route::get('/barang', [BarangController::class, 'index']);
    Route::post('/barang', [BarangController::class, 'store']);
    Route::get('/barang/cari', [BarangController::class, 'cari']);
    Route::get('/barang/tambah', [BarangController::class, 'create']);
    Route::delete('/barang/{id}', [BarangController::class, 'destroy']);
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit']);
    Route::patch('/barang/{id}/update', [BarangController::class, 'update']);
    Route::get('/penjualan', [PenjualanController::class, 'index']);
    Route::post('/penjualan', [PenjualanController::class, 'store']);
    Route::get('/penjualan/cari', [PenjualanController::class, 'cari']);
    Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy']);
    Route::get('/barang/{id}/jual', [PenjualanController::class, 'create']);
    Route::get('/export-penjualan', [PenjualanController::class, 'export']);
    Route::get('/export-barang', [BarangController::class, 'export']);
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [LoginController::class, 'showLoginForm']);
