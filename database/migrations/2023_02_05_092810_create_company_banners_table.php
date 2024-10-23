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
        Schema::create('company_banners', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('sidebar_banner')->nullable();
            $table->string('small_banner_one')->nullable();
            $table->string('small_banner_two')->nullable();
            $table->string('small_banner_three')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('company_banners');
    }
};
