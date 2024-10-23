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
        Schema::create('first_left_ad_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title_one')->nullable();
            $table->string('title_two')->nullable();
            $table->string('title_three')->nullable();
            $table->string('link')->nullable();
            $table->string('image');
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
        Schema::dropIfExists('first_left_ad_banners');
    }
};
