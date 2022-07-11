<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->bigInteger('roomtype_id')->unsigned();
            $table->bigInteger('member_id')->unsigned();
            $table->string('village');
            $table->string('district');
            $table->string('province');
            $table->string('horm');
            $table->string('far_from');
            $table->string('location');
            $table->string('price');
            $table->string('details')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('qty')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->foreign('roomtype_id')->references('id')->on('roomtype')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('member_id')->references('id')->on('member')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room');
    }
}
