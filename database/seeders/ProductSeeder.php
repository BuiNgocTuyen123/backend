<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Laptop Gaming', 'description' => 'Laptop mạnh mẽ cho game thủ', 'price' => 25000000, 'stock' => 10, 'image' => 'laptop.jpg'],
            ['name' => 'Bàn Phím Cơ', 'description' => 'Bàn phím cơ RGB chất lượng', 'price' => 1200000, 'stock' => 50, 'image' => 'keyboard.jpg'],
            ['name' => 'Chuột Gaming', 'description' => 'Chuột gaming siêu nhạy', 'price' => 800000, 'stock' => 30, 'image' => 'mouse.jpg'],
        ]);
    }
}
