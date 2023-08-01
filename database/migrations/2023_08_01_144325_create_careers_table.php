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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('email');
            $table->string('title');
            $table->string('slug');
            $table->text('jobdesc');
            $table->text('requirement');
            $table->text('note')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',['open','closed']);
            // $table->date('start');
            $table->date('end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
