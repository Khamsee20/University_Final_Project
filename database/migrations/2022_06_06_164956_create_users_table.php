<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('Lname');
                $table->string('gender');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->bigInteger('position_id')->unsigned();
                $table->string('roles');
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });

            Schema::table('users', function(Blueprint $table){
                $table->foreign('position_id')->references('id')->on('position')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
