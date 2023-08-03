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
        Schema::create('resellers', function (Blueprint $table) {
            $table->id('id_reseller');
            $table->string('name');
            $table->string('email');
            $table->enum('gender',['pria','wanita']);
            $table->string('phone');
            $table->date('birth_date');
            $table->string('identity_card')->unique();
            $table->enum('status',['active','non-active']);
            $table->string('address');
            $table->string('province');
            $table->string('city');
            $table->string('subdistrict');
            $table->string('postal_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resellers');
    }
};
