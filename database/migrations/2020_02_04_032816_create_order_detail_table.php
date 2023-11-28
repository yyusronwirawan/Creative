<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->float('product_price')->default(0);
            $table->integer('product_quantity')->default(0);
            $table->string('product_name')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->integer('product_variant_id')->default(0);
            $table->float('product_original_price')->default(0);
            $table->softDeletes();
            $table->timestamps();

            // $table->foreign('product_variant_id')->references('id')->on('product_variant')->onDelete('set null');
            // $table->foreign('product_id')->references('id')->on('product')->onDelete('set null');
            // $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
