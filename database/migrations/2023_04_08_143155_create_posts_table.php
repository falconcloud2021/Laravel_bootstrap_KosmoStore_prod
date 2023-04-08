<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('category_id');
            $table->string('post_title_ua');
            $table->string('post_title_ru');
            $table->string('post_slug_ua');
            $table->string('post_slug_ru');
            $table->string('post_image');
            $table->text('post_details_ua');
            $table->text('post_details_ru');
            $table->integer('post_touches')->nullable();
            $table->smallInteger('post_rated')->nullable(); 
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
