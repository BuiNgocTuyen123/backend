<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\AdminController;
use Illuminate\Http\Request;  // Thêm import Request

// Định nghĩa route với middleware auth:sanctum và trả về thông tin người dùng bằng hàm getUserInfo của AdminController
// Route::prefix('v1')->middleware('auth:sanctum')->get('/user', [AdminController::class, 'getUserInfo']);

// Routes cho sản phẩm
Route::middleware('auth:sanctum')->get('/v1/user', [AdminController::class, 'getUserInfo']);
Route::get('/v1/products', [ProductController::class, 'index']);
Route::post('/v1/products', [ProductController::class, 'store']);

// Routes cho admin
Route::post('/v1/admin/login', [AdminController::class, 'login']);
Route::post('/v1/admin/signup', [AdminController::class, 'signup']);
