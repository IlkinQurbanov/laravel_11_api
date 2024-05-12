<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::controller(ProductController::class)->group(function () {

    Route::get('products', 'index');
    Route::post('product/create', 'store');
    Route::put('product/update/{id}', 'update');
    Route::get('product/read/{id}', 'show');
    Route::delete('product/delete/{id}', 'destroy');

});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
