<?php

use App\Http\Controllers\BukuController; //tanpi api
use App\Http\Controllers\KeuanganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('buku', [BukuController::class, 'index']);
Route::post('buku', [BukuController::class, 'store']);
Route::get('buku/{id}', [BukuController::class, 'edit']);
Route::put('buku/{id}', [BukuController::class, 'update']);
Route::delete('buku/{id}', [BukuController::class, 'destroy']);

Route::get('keuangan', [KeuanganController::class, 'index']);