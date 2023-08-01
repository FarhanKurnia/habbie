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
        Schema::create('body_recommendations', function (Blueprint $table) {
            $table->id('id_body_recommendation');
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->unsignedBigInteger('product_id');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id_product')->on('products')->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('body__recommendations');
    }
};
