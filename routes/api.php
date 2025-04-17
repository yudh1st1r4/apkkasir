<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;

Route::get('/pelanggan', [ApiController::class, 'getPelanggan']);
Route::get('/penjualan', [ApiController::class, 'getPenjualan']);
Route::get('/api/pelanggan', [PelangganController::class, 'index']);
Route::get('/api/penjualan', [PenjualanController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
