<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/pengguna',\App\Http\Controllers\UserController::class);
Route::resource('/kelas',\App\Http\Controllers\KelasController::class);

