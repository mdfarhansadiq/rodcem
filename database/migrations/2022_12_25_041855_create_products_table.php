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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('category')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('price')->nullable();
            $table->string('image')->nullable();
            $table->string('details_image')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
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
        Schema::dropIfExists('products');
    }
};
