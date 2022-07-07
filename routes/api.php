<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {
    Route::controller(AuthController::class)->group(function() {
        Route::post('/login', 'login');
        Route::post('/register-pengguna', 'registerPengguna');
        Route::post('/logout', 'logout');
    });

    Route::controller(PelangganController::class)->group(function() {
        Route::post('/info-tagihan-p', 'infoTagihanPublic');
        Route::get('/info-pelanggan/{nomor_sl}', 'infoPelanggan');
    });
});

