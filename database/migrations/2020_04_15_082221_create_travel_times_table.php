<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('start_time');
            $table->string('stop_time');
            $table->text('medium_time')->nullable();
            $table->integer('car_id');
            $table->integer('travel_id');
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
        Schema::dropIfExists('travel_times');
    }
}
