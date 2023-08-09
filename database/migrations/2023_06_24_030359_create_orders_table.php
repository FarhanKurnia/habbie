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
            $table->string('province');
            $table->string('city');
            $table->string('subdistrict');
            $table->string('postal_code');
            // $table->enum('status_payment',['unpaid','failed','paid']);
            // $table->enum('status_order',['open','confirmed','process','done']);
            // $table->enum('status',['pending','failed','process','done']);
            $table->enum('status',['open','pending','failed','process','done']);
            $table->integer('sub_total');
            $table->string('resi')->nullable();
            $table->string('shipping_code');
            $table->string('shipping_service');
            $table->integer('shipping_value');
            $table->string('shipping_etd');
            $table->string('invoice');
            $table->integer('total');
            $table->integer('total_weight')->nullable();
            $table->text('note')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
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
