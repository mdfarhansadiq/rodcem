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
        Schema::create('agent_nominee_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_id');
            $table->text('nominee_name')->nullable();
            $table->text('nominee_phone')->nullable();
            $table->text('nominee_email')->nullable();
            $table->text('nominee_nid_no')->nullable();
            $table->string('nominee_photo')->nullable();
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
        Schema::dropIfExists('agent_nominee_infos');
    }
};
