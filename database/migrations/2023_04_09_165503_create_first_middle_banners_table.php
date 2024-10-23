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
        Schema::create('first_middle_banners', function (Blueprint $table) {
            $table->id();

            $table->string('first_banner_title_one')->nullable();
            $table->string('first_banner_title_two')->nullable();
            $table->string('first_banner_link');
            $table->string('first_banner_image');

            $table->string('second_banner_title_one')->nullable();
            $table->string('second_banner_title_two')->nullable();
            $table->string('second_banner_link');
            $table->string('second_banner_image');
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
        Schema::dropIfExists('first_middle_banners');
    }
};
