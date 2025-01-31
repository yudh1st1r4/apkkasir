<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
//use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\DetailPenjualanController;

Route::get('/detailpenjualan/create/{penjualanID}', [DetailPenjualanController::class, 'create'])->name('detailpenjualan.create');


    Route::resource('pelanggan', PelangganController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('penjualan', PenjualanController::class); 
    Route::resource('detailpenjualan', DetailPenjualanController::class);

    Route::get('/detailpenjualan/create/{penjualanID}', [DetailPenjualanController::class, 'create'])->name('detailpenjualan.create');
//Route::post('/detailpenjualan/store/{penjualanID}', [DetailPenjualanController::class, 'store'])->name('detailpenjualan.store');
Route::get('/detailpenjualan/edit/{id}', [DetailPenjualanController::class, 'edit'])->name('detailpenjualan.edit');
Route::put('/detailpenjualan/update/{id}', [DetailPenjualanController::class, 'update'])->name('detailpenjualan.update');
Route::get('/detailpenjualan', [DetailPenjualanController::class, 'index'])->name('detailpenjualan.index');

//pembayaran
Route::get('/pembayaran', [PembayaranController::class, 'showForm'])->name('pembayaran.form');
Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');

//kasir
Route::resource('kasir', KasirController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

use App\Http\Controllers\Auth\RegisterController;

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.submit');
