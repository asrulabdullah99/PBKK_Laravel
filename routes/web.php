<?php

use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MatakuliahController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/pengguna',UserController::class);
Route::resource('/kelas',KelasController::class);
Route::resource('/matakuliah',MatakuliahController::class);
Route::resource('/dosen',DosenController::class);

