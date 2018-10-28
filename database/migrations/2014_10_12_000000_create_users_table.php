<?php

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
            $table->increments('id');
            $table->string('name', 191);
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->string('user_id', 191)->nullable();
            $table->string('user_birthday', 191)->nullable();
            $table->string('user_phone', 191)->nullable();
            $table->string('user_address', 191)->nullable();
            $table->string('user_district', 191)->nullable();
            $table->string('user_province', 191)->nullable();
            $table->string('user_gender', 191)->nullable();
            $table->string('user_avatar', 191)->default('images/avatar.png');
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
        Schema::drop('users');
    }
}
