<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionWorkOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_work_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('action_id');
            $table->foreignId('work_order_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('action_id')->references('id')->on('actions');
            $table->foreign('work_order_id')->references('id')->on('work_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action_work_order');
    }
}
