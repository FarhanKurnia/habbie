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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id_payment');
            $table->string('gross_amount');
            $table->string('transaction_time');
            $table->string('payment_type');
            $table->string('transaction_status');
            $table->string('transaction_id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('invoice_id');
            $table->timestamps();
            $table->foreign('order_id')->references('id_order')->on('orders')->onDelete('cascade');
            // $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
