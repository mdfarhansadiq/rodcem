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
        Schema::create('our_news', function (Blueprint $table) {
            $table->id();
            $table->integer('news_category_id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('author')->nullable();
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
        Schema::dropIfExists('news');
    }
};
