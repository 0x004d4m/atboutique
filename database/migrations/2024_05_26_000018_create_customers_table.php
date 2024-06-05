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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->unsignedInteger('language_id');
            $table->foreign('language_id')->on('languages')->references('id');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->on('countries')->references('id');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->on('states')->references('id');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->on('cities')->references('id');
            $table->string('zip_code');
            $table->string('address');
            $table->string('phone');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
