<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePercalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('from');
            $table->integer('to');
            $table->string('transmitter_name');
            $table->string('receiver_name');
            $table->string('transmitter_phone');
            $table->string('receiver_phone');
            $table->string('receiver_email')->nullable();
            $table->string('type')->nullable();
            $table->integer('quantity');
            $table->float('shipping_fee');
            $table->boolean('received')->default(false);
            $table->boolean('to_received')->default(false);
            $table->date('to_received_date')->nullable();
            $table->date('received_date')->nullable();
            $table->date('assigned_at');
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
        Schema::dropIfExists('percales');
    }
}
