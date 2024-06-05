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
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->on('customers')->references('id');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->on('countries')->references('id');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->on('states')->references('id');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->on('cities')->references('id');
            $table->string('zip_code');
            $table->string('address');

            $table->unsignedBigInteger('shipping_company_id');
            $table->foreign('shipping_company_id')->on('shipping_companies')->references('id');
            $table->unsignedBigInteger('order_status_id');
            $table->foreign('order_status_id')->on('order_statuses')->references('id');
            $table->unsignedBigInteger('coupon_id');
            $table->foreign('coupon_id')->on('coupons')->references('id');

            $table->double('total_cost_price');
            $table->double('total_selling_price');

            $table->timestamps();
            $table->softDeletes();
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
