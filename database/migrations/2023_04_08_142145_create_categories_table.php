<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name_ua');
            $table->string('category_name_ru');
            $table->string('category_slug_ua');
            $table->string('category_slug_ru');
            $table->text('category_description_ua')->nullable();
            $table->text('category_description_ru')->nullable();
            $table->integer('category_touches')->nullable('1');
            $table->smallInteger('category_rated')->nullable('1');
            $table->string('category_icon')->nullable(); 
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
        Schema::dropIfExists('categories');
    }
}
