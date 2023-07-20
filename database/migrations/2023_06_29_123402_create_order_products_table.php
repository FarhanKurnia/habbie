<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id('id_order_product');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->integer('price');
            $table->integer('discount_price');
            $table->integer('sub_total_price');
            $table->integer('total_price');
            $table->integer('qty');
            $table->timestamps();

            $table->foreign('order_id')->references('id_order')->on('orders')->onDelete('cascade');        
            $table->foreign('product_id')->references('id_product')->on('products')->onDelete('cascade');        
            $table->foreign('discount_id')->references('id_discount')->on('discounts')->onDelete('cascade');        

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
