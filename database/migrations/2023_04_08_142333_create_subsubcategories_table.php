<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsubcategories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('subsubcategory_name_ua');
            $table->string('subsubcategory_name_ru');
            $table->string('subsubcategory_slug_ua');
            $table->string('subsubcategory_slug_ru'); 
            $table->text('subsubcategory_description_ua')->nullable();
            $table->text('subsubcategory_description_ru')->nullable();
            $table->integer('subsubcategory_touches')->nullable();
            $table->smallInteger('subsubcategory_rated')->nullable();
            $table->string('subsubcategory_img')->nullable();
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
        Schema::dropIfExists('subsubcategories');
    }
}
