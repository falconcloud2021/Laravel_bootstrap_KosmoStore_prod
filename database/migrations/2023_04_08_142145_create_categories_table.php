<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
            $table->string('category_icon')->nullable();
            $table->text('category_description_ua')->nullable();
            $table->text('category_description_ru')->nullable();
            $table->integer('category_touches')->default(0);
            $table->float('category_rated', 3, 2)->nullable();
            $table->enum('category_status', ['active','hold','stop'])->default('active');
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
        Schema::dropIfExists('categories');
    }
}
