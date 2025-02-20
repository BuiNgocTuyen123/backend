<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Lấy tất cả sản phẩm từ database

        return response()->json([
            'success' => true,
            'message' => 'Danh sách sản phẩm',
            'data' => $products,
        ]);
    }
}
