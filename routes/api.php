<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\AdminController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/v1/products', [ProductController::class, 'index']);
Route::post('/v1/products', [ProductController::class, 'store']);

Route::post('/v1/admin/login', [AdminController::class, 'login']);
Route::post('/v1/admin/signup', [AdminController::class, 'signup']);
