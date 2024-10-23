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
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('status')->default(0);
            $table->text('message')->nullable();
            // $table->integer('designation')->nullable();
            $table->unsignedBigInteger('designation')->nullable(); // Designation column as unsigned BigInt, nullable
            $table->foreign('designation')->references('id')->on('expert_categories')->onDelete('cascade');

            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('service_zone'); // Service zone column as unsigned BigInt
            $table->foreign('service_zone')->references('id')->on('districts')->onDelete('cascade');
            $table->text('about')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('experts');
    }
};
