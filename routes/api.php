<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;

Route::get('/v1/products', [ProductController::class, 'index']);
Route::post('/v1/products', [ProductController::class, 'store']);

// cbxc