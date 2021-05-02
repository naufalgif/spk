<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\SolusiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#User
Route::get('/', function () {return view('home');});
//Route::get('/', [HomeController::class,'index']);
//Route::get('/home', [HomeController::class,'index']);

Route::get('/pasien/{nama_pasien?}', function ($nama_pasien = null) {
    return view('pasien', ['nama_pasien'  => $nama_pasien]);
});

Route::get('/diagnosis', function () {
    return view('diagnosis');
});

Route::get('/informasi', function () {
    return view('informasi');
});

Route::get('/login', function () {
    return view('login');
});

Route::view('/about', 'v_about', [
    'about' => 'Sistem Pendukung Keputusan ini merupakan sistem yang memberi keputusan
    apakah terkena penyakit atau tidak dari gejala yang dialamin oleh pengguna dengan menggunakan 
    metode Fuzzy logic dan AHP'
]);

/*--------ADMIN-------------------*/
Route::get('/admin', [AdminController::class, 'index']);

Route::get('/diagnosa', [DiagnosaController::class, 'index']);

Route::get('/gejala', [GejalaController::class, 'index'])->name('gejala');
Route::get('/gejala/detail/{id_gejala}', [GejalaController::class, 'detail']);
Route::get('/gejala/add', [GejalaController::class, 'add']);
Route::post('/gejala/insert', [GejalaController::class, 'insert']);
Route::get('/gejala/edit/{id_gejala}', [GejalaController::class, 'edit']);
Route::post('/gejala/update/{id_gejala}', [GejalaController::class, 'update']);
Route::get('/gejala/delete/{id_gejala}', [GejalaController::class, 'delete']);


Route::get('/solusi', [SolusiController::class, 'index'])->name('solusi');
Route::get('/solusi/detail/{id_solusi}', [SolusiController::class, 'detail']);
Route::get('/solusi/add', [SolusiController::class, 'add']);
Route::post('/solusi/insert', [SolusiController::class, 'insert']);

Route::get('/user', [UserController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function(){
    Route::get('/', [Admin\Auth\LoginController::class, 'loginForm']);
    Route::get('/login', [Admin\Auth\LoginController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [Admin\Auth\LoginController::class, 'login'])->name('admin.login');
    Route::get('/home', [Admin\HomeController::class, 'index'])->name('admin.a_home');
    Route::get('/logout', [Admin\Auth\LoginController::class, 'logout'])->name('admin.logout'); 
});

Route::prefix('user')->group(function(){
    Route::get('/', [Auth\LoginController::class, 'loginForm']);
    Route::get('/login', [Auth\LoginController::class, 'loginForm'])->name('user.login');
    Route::post('/login', [Auth\LoginController::class, 'login'])->name('user.login');
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
    Route::get('/logout', [Auth\LoginController::class, 'logout'])->name('user.logout'); 
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
