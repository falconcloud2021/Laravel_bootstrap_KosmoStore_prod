<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
            $table->decimal('price', 10, 2);
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
            $table->float('product_rated', 3, 2)->nullable();
            $table->enum('product_status', ['active','hold','stop'])->default('active');
            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->foreignIdFor(User::class, 'updated_by')->nullable();
            $table->foreignIdFor(User::class, 'deleted_by')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('products');
    }
}
