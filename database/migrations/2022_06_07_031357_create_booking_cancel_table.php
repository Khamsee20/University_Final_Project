<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingCancelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_cancel', function (Blueprint $table) {
            $table->id();
            $table->date('cancel_date')->nullable();
            $table->bigInteger('booking_id')->unsigned();
            $table->timestamps();
            $table->foreign('booking_id')->references('id')->on('booking')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_cancel');
    }
}
