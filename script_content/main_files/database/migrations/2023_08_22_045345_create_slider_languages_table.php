<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_languages', function (Blueprint $table) {
            $table->id();
            $table->integer('slider_id');
            $table->string('lang_code');
            $table->string('home1_title')->nullable();
            $table->string('home2_title')->nullable();
            $table->string('home2_description')->nullable();
            $table->string('home3_title')->nullable();
            $table->string('home3_description')->nullable();            
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
        Schema::dropIfExists('slider_languages');
    }
};
