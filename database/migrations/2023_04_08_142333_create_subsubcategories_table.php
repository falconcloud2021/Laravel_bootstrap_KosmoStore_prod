<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
            $table->string('sub_subcategory_name_ua');
            $table->string('sub_subcategory_name_ru');
            $table->string('sub_subcategory_slug_ua');
            $table->string('sub_subcategory_slug_ru');
            $table->string('sub_subcategory_img')->nullable(); 
            $table->text('sub_subcategory_description_ua')->nullable();
            $table->text('sub_subcategory_description_ru')->nullable();
            $table->integer('sub_subcategory_touches')->nullable();
            $table->float('sub_subcategory_rated', 3, 2)->nullable();
            $table->enum('sub_subcategory_status', ['active','hold','stop'])->default('active');
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
        Schema::dropIfExists('subsubcategories');
    }
}
