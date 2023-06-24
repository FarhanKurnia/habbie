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
        Schema::create('carts', function (Blueprint $table) {
            $table->id('id_cart');
            $table->string('status');
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customer_id');
            
            $table->foreign('product_id')->references('id_product')->on('products')->onDelete('cascade');
            $table->foreign('customer_id')->references('id_customer')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
