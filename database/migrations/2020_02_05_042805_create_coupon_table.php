<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->string('discount_type')->nullable();
            $table->float('coupon_amount')->default(0);
            $table->date('coupon_expiry_date')->nullable();
            $table->float('minimum_spend')->default(0);
            $table->float('maximum_spend')->default(0);
            $table->integer('usage_limit_per_coupon')->default(0);
            $table->integer('usage_limit_per_user')->default(0);
            $table->integer('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon');
    }
}
