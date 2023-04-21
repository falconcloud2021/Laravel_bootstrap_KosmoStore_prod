<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
            $table->string('blog_category_image')->nullable();
            $table->integer('blog_category_touches')->nullable();
            $table->float('blog_category_rated', 3, 2)->nullable();
            $table->enum('blog_category_status', ['active','hold','stop'])->default('active');
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
        Schema::dropIfExists('post_categories');
    }
}
