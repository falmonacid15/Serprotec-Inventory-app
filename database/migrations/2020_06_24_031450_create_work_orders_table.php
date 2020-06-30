<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('diagnostic');
            $table->string('observation');
            $table->time('start_time');
            $table->time('end_time');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('ticket_number');
            $table->string('service_tag');
            $table->foreignId('equipment_id');
            $table->foreignId('commune_id');
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->foreign('commune_id')->references('id')->on('communes');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_orders');
    }
}
