<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenominationTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denomination_test', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('word_1');
            $table->boolean('word_2');
            $table->boolean('word_3');
            $table->boolean('word_4');
            $table->boolean('word_5');
            $table->boolean('word_6');
            $table->boolean('word_7');
            $table->boolean('word_8');
            $table->boolean('word_9');
            $table->boolean('word_10');
            $table->boolean('word_11');
            $table->boolean('word_12');
            $table->boolean('word_13');
            $table->boolean('word_14');
            $table->boolean('word_15');
            $table->boolean('word_16');
            $table->boolean('word_17');
            $table->boolean('word_18');
            $table->boolean('word_19');
            $table->boolean('word_20');            
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
        Schema::dropIfExists('denomination_test');
    }
}
