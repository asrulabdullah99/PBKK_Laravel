<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/pengguna/{user_id}',[UserController::class,'tampilData']);
// Route::get('/pengguna',[UserController::class,'index']);
// Route::get('/pengguna/create', [UserController::class,'create']);

Route::resource('/pengguna',\App\Http\Controllers\UserController::class);