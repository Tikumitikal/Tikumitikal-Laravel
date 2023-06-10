<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/index', function () {
    return view('landing.index');
});

Route::get('/about', function () {
    return view('landing.about');
});

Route::get('/menu', function () {
    return view('landing.menu');
});

Route::get('/contact', function () {
    return view('landing.contact');
});


Route::get('/login', [AuthController::class, 'index'])->middleware('IsStay');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('IsStay');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('IsLogin');

Route::get('/datauser', [UserController::class, 'index'])->middleware('IsLogin');
Route::post('/datauser', [UserController::class, 'store'])->middleware('IsLogin');
Route::put('/datauser/{id}', [UserController::class, 'update'])->middleware('IsLogin');
Route::delete('/datauser/{id}', [UserController::class, 'destroy'])->middleware('IsLogin');

Route::get('/datakategori', [KategoriController::class, 'index'])->middleware('IsLogin');
Route::post('/datakategori', [KategoriController::class, 'store'])->middleware('IsLogin');
Route::put('/datakategori/{id}', [KategoriController::class, 'update'])->middleware('IsLogin');
Route::delete('/datakategori/{id}', [KategoriController::class, 'destroy'])->middleware('IsLogin');

Route::get('/datameja', [MejaController::class, 'index'])->middleware('IsLogin');
Route::post('/datameja', [MejaController::class, 'store'])->middleware('IsLogin');
Route::put('/datameja/{id}', [MejaController::class, 'update'])->middleware('IsLogin');
Route::delete('/datameja/{id}', [MejaController::class, 'destroy'])->middleware('IsLogin');

Route::get('/dataproduct', [ProductController::class, 'index'])->middleware('IsLogin');
Route::post('/dataproduct', [ProductController::class, 'store'])->middleware('IsLogin');
Route::put('/dataproduct/{id}', [ProductController::class, 'update'])->middleware('IsLogin');
Route::delete('/dataproduct/{id}', [ProductController::class, 'destroy'])->middleware('IsLogin');

Route::get('/datareservasi', [ReservasiController::class, 'index'])->middleware('IsLogin');
Route::put('/datareservasi/{id}', [ReservasiController::class, 'update'])->middleware('IsLogin');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('IsLogin');