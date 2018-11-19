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
            $table->string('post_id', 191)->nullable();
            $table->string('user_id', 191)->nullable();
            $table->string('title', 191)->nullable();
            $table->text('content')->nullable();
            $table->string('type', 191)->nullable();
            $table->string('detail', 191)->nullable();
            $table->string('image', 191)->default('images/posts/no-image-90.png');
            $table->string('image_of_post', 191)->nullable();
            $table->integer('age')->nullable();
            $table->string('phone', 191)->nullable();
            $table->string('type_post', 191)->nullable();
            $table->integer('salary')->nullable();
            $table->string('gender', 191)->nullable();
            $table->string('address', 191)->nullable();
            $table->string('district', 191)->nullable();
            $table->string('province', 191)->nullable();
            $table->integer('views')->nullable();
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
