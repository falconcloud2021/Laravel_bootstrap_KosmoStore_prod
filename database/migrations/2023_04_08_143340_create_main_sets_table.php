<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_sets', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(); 
            $table->string('phone_one')->nullable(); 
            $table->string('phone_two')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('company_name')->nullable(); 
            $table->string('company_address')->nullable(); 
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('vider')->nullable();
            $table->string('facebook')->nullable();          
            $table->string('twitter')->nullable(); 
            $table->string('linkedin')->nullable(); 
            $table->string('googleplus')->nullable();
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
        Schema::dropIfExists('main_sets');
    }
}
