<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); // Khóa ngoại đến users
            $table->unsignedBigInteger('product_id'); // Khóa ngoại đến products
            $table->float('price', 10, 2); // Giá sản phẩm
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->timestamps(); // Tự động thêm created_at và updated_at
            
            // Khóa chính tổ hợp
            $table->primary(['user_id', 'product_id']);

            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
