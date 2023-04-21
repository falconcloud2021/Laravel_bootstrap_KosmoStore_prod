<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
            $table->string('subcategory_img')->nullable();
            $table->text('subcategory_description_ua')->nullable();
            $table->text('subcategory_description_ru')->nullable();
            $table->integer('subcategory_touches')->nullable();
            $table->float('subcategory_rated', 3, 2)->nullable();
            $table->enum('subcategory_status', ['active','hold','stop'])->default('active');
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
        Schema::dropIfExists('subcategories');
    }
}
