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
        Schema::create('agent_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_id');
            $table->integer('subscription_type');
            $table->dateTime('subscripiton_book_date');
            $table->dateTime('subscripiton_start');
            $table->dateTime('subscripiton_end');
            $table->integer('amount');
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
        Schema::dropIfExists('agent_subscriptions');
    }
};
