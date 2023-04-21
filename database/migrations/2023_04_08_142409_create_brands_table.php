<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name', 56);
            $table->string('brand_slug', 56);
            $table->string('brand_logo', 1000)->nullable();
            $table->text('brand_description_ua', 2000)->nullable();
            $table->text('brand_description_ru', 2000)->nullable();
            $table->integer('brand_touches')->nullable();
            $table->float('brand_rated', 3, 2)->nullable();
            $table->enum('brand_status', ['active','hold','stop'])->default('active');
            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->foreignIdFor(User::class, 'updated_by')->nullable();
            $table->foreignIdFor(User::class, 'deleted_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('brands');
    }
}
