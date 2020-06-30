<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->foreignId('business_id');
            $table->foreignId('equipment_type_id');
            $table->timestamps();

            $table->foreign('business_id')->references('id')->on('businesses');
            $table->foreign('equipment_type_id')->references('id')->on('equipment_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }
}
