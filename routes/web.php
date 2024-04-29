<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pengguna/{user_id}',[UserController::class,'tampilData']);
Route::get('/pengguna',[UserController::class,'index']);