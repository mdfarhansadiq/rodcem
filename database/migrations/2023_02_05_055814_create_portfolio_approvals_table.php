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
        Schema::create('portfolio_approvals', function (Blueprint $table) {
            $table->id();
            $table->integer('expert_id');
            $table->integer('status')->default(0);
            $table->text('message')->default('Your Portfilo Published After Admins Approval.');
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
        Schema::dropIfExists('portfolio_approvals');
    }
};
