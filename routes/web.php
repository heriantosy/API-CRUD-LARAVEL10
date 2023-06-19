<?php

use App\Http\Controllers\BukuController; //tanpi api
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('buku', [BukuController::class, 'index']);
Route::post('buku', [BukuController::class, 'store']);