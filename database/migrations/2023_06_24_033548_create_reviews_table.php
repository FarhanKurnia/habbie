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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('id_review');
            $table->string('name');
            $table->enum('rating',[1,2,3,4,5]);
            $table->string('description');            
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};