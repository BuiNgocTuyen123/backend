<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->map(function ($product) {
            $product->image = $product->image ? asset('storage/' . $product->image) : null;
            return $product;
        });
    
        return response()->json([
            'success' => true,
            'message' => 'Danh sách sản phẩm',
            'data' => $products,
        ]);
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 🔹 Chỉ cho phép file ảnh
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public'); // 🔹 Lưu ảnh vào storage
        }
    
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath, // 🔹 Lưu đường dẫn ảnh vào DB
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Sản phẩm đã được thêm!',
            'data' => $product,
        ]);
    }
    
}
