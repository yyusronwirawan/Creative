<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('member_id');
            $table->string('invoice_number')->nullable();
            $table->float('sub_total',10,2)->default(0);
            $table->float('discount_price',10,2)->default(0);
            $table->float('discount_percentage',10,2)->default(0);
            $table->float('total_price',10,2)->default(0);
            $table->string('promo_code')->nullable();
            $table->string('last_shipping_status')->nullable();
            $table->string('last_billing_status')->nullable();
            $table->integer('cart_id');
            $table->string('shipping_method')->default(0);
            $table->integer('shipping_fee')->default(0);
            $table->string('tracking_number')->nullable();
            $table->string('payment_method')->nullable();
            $table->float('sub_total_original',10,2)->default(0);
            $table->integer('status');
            $table->softDeletes();
            $table->timestamps();

            //$table->foreign('member_id')->references('id')->on('member')->onDelete('set null');
            //$table->foreign('cart_id')->references('id')->on('cart')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
