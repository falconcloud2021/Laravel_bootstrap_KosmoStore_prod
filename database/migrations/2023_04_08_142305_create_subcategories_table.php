<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('subcategory_name_ua');
            $table->string('subcategory_name_ru');
            $table->string('subcategory_slug_ua');
            $table->string('subcategory_slug_ru');
            $table->text('subcategory_description_ua')->nullable();
            $table->text('subcategory_description_ru')->nullable();
            $table->integer('subcategory_touches')->nullable();
            $table->smallInteger('subcategory_rated')->nullable();
            $table->string('subcategory_img')->nullable();
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
        Schema::dropIfExists('subcategories');
    }
}
