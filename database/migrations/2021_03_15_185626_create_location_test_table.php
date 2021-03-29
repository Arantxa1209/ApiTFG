<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_test', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('slide_1');
            $table->boolean('slide_2');
            $table->boolean('slide_3');
            $table->boolean('slide_4');
            $table->boolean('slide_5');
            $table->boolean('slide_6');
            $table->boolean('slide_7');
            $table->boolean('slide_8');
            $table->boolean('slide_9');
            $table->boolean('slide_10');
            $table->unsignedInteger('success');
            $table->unsignedInteger('fails');
            $table->unsignedInteger('points');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_test');
    }
}
