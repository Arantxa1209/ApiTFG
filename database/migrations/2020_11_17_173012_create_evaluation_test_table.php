<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_test', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('question_1');
            $table->boolean('question_2');
            $table->boolean('question_3');
            $table->boolean('question_4');
            $table->boolean('question_5');
            $table->boolean('question_6');
            $table->boolean('question_7');
            $table->boolean('question_8');
            $table->boolean('question_9');
            $table->boolean('question_10');
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
        Schema::dropIfExists('evaluation_test');
    }
}
