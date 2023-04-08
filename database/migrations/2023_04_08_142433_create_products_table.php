<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_ua');
            $table->string('product_name_ru');
            $table->string('product_slug_ua');
            $table->string('product_slug_ru');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_ua');
            $table->string('product_tags_ru');
            $table->string('product_size_ua')->nullable();
            $table->string('product_size_ru')->nullable();
            $table->string('product_color_ua');
            $table->string('product_color_ru');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_description_ua');
            $table->string('short_description_ru');
            $table->string('full_description_ua');
            $table->string('full_description_ru');
            $table->string('product_thambnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('product_touches')->nullable();
            $table->smallInteger('product_rated')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
