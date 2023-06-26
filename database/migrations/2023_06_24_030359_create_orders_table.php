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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_order');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('status');
            $table->string('total');
            $table->string('resi');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            // $table->unsignedBigInteger('voucher_id');
            $table->timestamps();
            
            $table->foreign('product_id')->references('id_product')->on('products')->onDelete('cascade');
            $table->foreign('customer_id')->references('id_customer')->on('customers')->onDelete('cascade');
            // $table->foreign('voucher_id')->references('id_voucher')->on('vouchers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
