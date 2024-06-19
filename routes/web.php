<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'registerPost'])->name('register');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'loginPost'])->name('login');
  });
  Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', [HomeController::class, 'index']);
  Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
  });


// Route::get('/', function () {
//     return view('template.app');
// });



Route::resource('/pengguna',UserController::class);
Route::resource('/kelas',KelasController::class);
Route::resource('/matakuliah',MatakuliahController::class);
Route::resource('/dosen',DosenController::class);
Route::resource('/mahasiswa',MahasiswaController::class);
Route::resource('/jadwal',JadwalController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
