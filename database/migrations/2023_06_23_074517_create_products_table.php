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
            $table->string('category');
            $table->string('image');
            $table->string('description');
            $table->string('price');
            $table->string('stock');
            $table->string('rating');
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->timestamps();
            
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
