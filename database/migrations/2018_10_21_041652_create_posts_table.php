<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_id', 191);
            $table->string('user_id', 191);
            $table->string('title', 191);
            $table->text('content');
            $table->string('type', 191);
            $table->string('image', 191)->default('images/posts/landscape.jpeg');
            $table->integer('age');
            $table->string('experience', 191);
            $table->integer('salary');
            $table->string('gender', 191);
            $table->string('address', 191);
            $table->string('district', 191);
            $table->string('province', 191);
            $table->integer('views');
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
        Schema::dropIfExists('posts');
    }
}
