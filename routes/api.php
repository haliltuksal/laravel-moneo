<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CartController;

Route::middleware('api')->group(function () {
    // Product Routes
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index']);
    });

    // Cart Routes
    Route::group(['prefix' => 'cart'], function () {
        Route::post('/', [CartController::class, 'store']);
        Route::post('/{cart_id}/items', [CartController::class, 'addItem']);
        Route::get('/{cart_id}/total', [CartController::class, 'getTotal']);
    });
});
