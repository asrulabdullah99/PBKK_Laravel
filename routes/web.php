<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
  return view('welcome');
});
// Route::get('/', function () {
//   return view('landing_page');
// });



Route::group(['middleware' => 'guest'], function () {
  Route::get('/register', [RegisterController::class, 'register'])->name('register');
  Route::post('/register', [RegisterController::class, 'registerPost'])->name('register');
  Route::get('/login', [LoginController::class, 'login'])->name('login');
  Route::post('/login', [LoginController::class, 'loginPost'])->name('login');
});
// Route::group(['middleware' => 'auth'], function () {
//   Route::get('/home', [HomeController::class, 'index']);
//   Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');

//   Route::resource('/pengguna', UserController::class);
//   Route::resource('/kelas', KelasController::class);
//   Route::resource('/matakuliah', MatakuliahController::class);
//   Route::resource('/dosen', DosenController::class);
//   Route::resource('/mahasiswa', MahasiswaController::class);
//   Route::resource('/jadwal', JadwalController::class);
// });

// Route::group(['middleware' => 'auth'], function () {
//   Route::get('/dashboard', [DashboardController::class, 'adminDashboard']);
//   Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');

//   Route::resource('/pengguna', UserController::class);
//   Route::resource('/kelas', KelasController::class);
//   Route::resource('/matakuliah', MatakuliahController::class);
//   Route::resource('/dosen', DosenController::class);
//   Route::resource('/mahasiswa', MahasiswaController::class);
//   Route::resource('/jadwal', JadwalController::class);
// });

// Route::get('/', function () {
//     return view('template.app');
// });


Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware('auth', 'user-access:admin')->name('admin.')->group(function () {
  Route::resource('/admin/pengguna', UserController::class);
  Route::resource('/admin/kelas', KelasController::class);
  Route::resource('/admin/matakuliah', MatakuliahController::class);
  Route::resource('/admin/dosen', DosenController::class);
  Route::resource('/admin/mahasiswa', MahasiswaController::class);
  Route::resource('/admin/jadwal', JadwalController::class);
  Route::get('/admin', [HomeController::class, 'index'])->name('admin');
  Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware('auth', 'user-access:dosen')->name('dosen.')->group(function () {

  Route::get('/dosen/home', [HomeController::class, 'dosenHome'])->name('dosen.home');
  Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
  Route::get('/pengguna', [UserController::class,'index'])->name('pengguna.index');
  
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:mahasiswa'])->group(function () {

  Route::get('/mahasiswa/home', [HomeController::class, 'mahasiswaHome'])->name('mahasiswa.home');
  Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
});



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
