<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_customer');
            $table->string('name_customer');
            $table->string('username')->unique();
            $table->string('gender');
            $table->string('email_customer')->unique();
            $table->integer('phone_customer');
            $table->integer('nik_customer');
            $table->string('kota_customer');
            $table->string('kecamatan_customer');
            $table->text('addres_customer');
            $table->string('img_customer');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
