<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->string('blog_category_name_ua');
            $table->string('blog_category_name_ru');
            $table->string('blog_category_slug_ua');
            $table->string('blog_category_slug_ru');
            $table->integer('blog_category_touches')->nullable();
            $table->smallInteger('blog_category_rated')->nullable();
            $table->string('blog_category_image')->nullable();
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
        Schema::dropIfExists('post_categories');
    }
}
