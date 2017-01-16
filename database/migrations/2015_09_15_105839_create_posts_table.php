<?php

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
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->nullable();
            $table->string('categories',100)->nullable();
            $table->string('type',25);
            $table->string('ordertype',25)->nullable();
            $table->string('slug',225);
            $table->string('title',225)->nullable();
            $table->string('body',1000)->nullable();
            $table->string('thumb',255)->nullable();
            $table->string('approve',5)->nullable();
            $table->string('show_in_homepage',5)->nullable();
            $table->string('shared', 500)->nullable();
            $table->text('tags', 1)->nullable();
            $table->timestamps();
            $table->timestamp('featured_at')->nullable();
            $table->timestamp('published_at');
            $table->integer('pagination')->nullable();
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
        Schema::drop('posts');
    }
}
