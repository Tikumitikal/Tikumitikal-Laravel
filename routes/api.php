<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiKategoriController;
use App\Http\Controllers\ApiMejaController;
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\ApiReservasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [ApiAuthController::class, 'login']);
Route::post('register', [ApiAuthController::class, 'register']);

Route::post('product', [ApiProductController::class, 'all']);
Route::get('table', [ApiMejaController::class, 'all']);
Route::get('kategori', [ApiKategoriController::class, 'all']);
Route::get('product-top', [ApiProductController::class, 'topSoldProducts']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [ApiAuthController::class, 'logout']);
    Route::get('me', [ApiAuthController::class, 'userlogin']);
    Route::post('reservasi-add', [ApiReservasiController::class, 'add']);
    Route::post('cancel', [ApiReservasiController::class, 'cancel']);
    Route::post('reservasi-status', [ApiReservasiController::class, 'status']);
});
