<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\ProductController;

Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);
Route::post('admin/signup', [AdminController::class, 'signup']);

Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Đảm bảo người dùng đã đăng nhập và có quyền admin
Route::middleware('auth')->group(function () {
    Route::get('admin', [AdminController::class, 'checkAdmin']);  
    Route::resource('products', ProductController::class); 
});
Route::middleware('auth:sanctum')->post('/logout', [AdminController::class, 'logout']);
Route::get('login/google', [AdminController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [AdminController::class, 'handleGoogleCallback']);
