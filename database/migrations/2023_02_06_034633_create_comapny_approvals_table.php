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
        Schema::create('comapny_approvals', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->integer('status')->default(0);
            $table->text('message')->default('Your Company Published After Admins Approval.');
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
        Schema::dropIfExists('comapny_approvals');
    }
};
