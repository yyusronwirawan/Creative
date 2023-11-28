<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->string('order_no')->nullable();
            $table->date('date')->nullable();
            $table->string('amount')->nullable();
            $table->string('payment_to')->nullable();
            $table->string('account_no')->nullable();
            $table->string('account_holder')->nullable();
            $table->string('status')->nullable();
            
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('member')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_payment');
    }
}
