<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID tự động tăng
            $table->string('name'); // Tên sản phẩm
            $table->text('description')->nullable(); // Mô tả sản phẩm (có thể null)
            $table->decimal('price', 10, 2); // Giá sản phẩm (10 số, 2 chữ số thập phân)
            $table->integer('stock')->default(0); // Số lượng tồn kho
            $table->string('image')->nullable(); // Ảnh sản phẩm (URL)
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
