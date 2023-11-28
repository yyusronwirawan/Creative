<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRetailPriceToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->integer('retail_price')->default(0);
            $table->text('cara_ukur')->nullable();
            $table->string('note')->nullable();
            $table->float('weight')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn('retail_price');
            $table->dropColumn('cara_ukur');
            $table->dropColumn('note');
            $table->dropColumn('weight');
        });
    }
}
