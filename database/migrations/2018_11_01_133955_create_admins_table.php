<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->string('admin_id', 191)->nullable();
            $table->string('admin_birthday', 191)->nullable();
            $table->string('admin_phone', 191)->nullable();
            $table->string('admin_address', 191)->nullable();
            $table->string('admin_district', 191)->nullable();
            $table->string('admin_province', 191)->nullable();
            $table->string('admin_gender', 191)->nullable();
            $table->timestamp('last_sign_in_at')->nullable();
            $table->string('admin_avatar', 191)->default('images/avatar.png');
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
        Schema::drop('admins');
    }
}
