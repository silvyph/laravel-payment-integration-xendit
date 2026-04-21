<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\PaymentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/produk', [ProdukController::class, 'store']);
Route::put('/produk/{id}', [ProdukController::class, 'update']);
Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);
Route::post('/payment', [PaymentController::class, 'createInvoice']);
Route::post('/payment/v3', [PaymentController::class, 'createPayment']);
Route::post('/webhook/xendit', [PaymentController::class, 'webhook']);