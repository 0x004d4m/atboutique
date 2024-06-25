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
            $table->id();
            $table->integer('quantity');
            $table->double('single_product_cost_price');
            $table->double('total_product_cost_price');
            $table->double('single_product_selling_price');
            $table->double('total_product_selling_price');
            $table->text('session_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->on('customers')->references('id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->on('products')->references('id');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->on('sizes')->references('id');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->on('colors')->references('id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->on('orders')->references('id');
            $table->integer('rate')->default(0);
            $table->timestamps();
            $table->softDeletes();
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
