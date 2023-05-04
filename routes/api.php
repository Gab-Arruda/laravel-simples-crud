<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CompraController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'produto'], function () {
    Route::get('/', [ProdutoController::class, 'index']);
    Route::post('/create', [ProdutoController::class, 'store']);
    Route::get('/show/{id}', [ProdutoController::class, 'show']);
    Route::put('/{id}', [ProdutoController::class, 'update']);
    Route::delete('/{id}', [ProdutoController::class, 'destroy']);
});

Route::group(['prefix' => 'compra'], function () {
    Route::get('/', [CompraController::class, 'index']);
    Route::post('/create', [CompraController::class, 'store']);
    Route::get('/show/{id}', [CompraController::class, 'show']);
    Route::put('/{id}', [CompraController::class, 'update']);
    Route::delete('/{id}', [CompraController::class, 'destroy']);
});

