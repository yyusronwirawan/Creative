<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->integer('status');
            $table->datetime('last_login');
            $table->timestamps();
        });

        DB::table('admin')->insert(
            array(
                'username' => 'admin@branded.com',
                'password' => md5('adminbranded'),
                'email' => 'admin@branded.com',
                'last_login' => date('Y-m-d H:i:s'),
                'status' => 1,
            )
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
