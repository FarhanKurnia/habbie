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
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_product');
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->integer('price');
            $table->integer('stock');
            $table->integer('rating');
            $table->integer('weight');
            $table->string('slug')->unique();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            
            $table->foreign('category_id')->references('id_category')->on('product_categories')->onDelete('cascade');        
            $table->foreign('discount_id')->references('id_discount')->on('discounts')->onDelete('cascade');        
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
