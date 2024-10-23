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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('same_order_uid')->nullable();
            $table->integer('agent_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('total_price')->nullable();
            $table->string('agent_price')->nullable();
            $table->longText('note')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('status')->default('generated');
            $table->integer('user_id')->nullable();
            $table->string('user_order_status')->default('generated');
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
        Schema::dropIfExists('table_orders');
    }
};
