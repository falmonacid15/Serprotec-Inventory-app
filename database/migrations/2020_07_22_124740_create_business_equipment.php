<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessEquipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id');
            $table->foreignId('equipment_id');
            $table->timestamps();

            $table->foreign('business_id')->references('id')->on('businesses');
            $table->foreign('equipment_id')->references('id')->on('equipment');
        });
    }


    public function down()
    {
        Schema::dropIfExists('business_equipment');
    }
}
