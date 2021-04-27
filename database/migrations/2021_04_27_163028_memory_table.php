<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MemoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memory_test', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('word_1')->nullable();
            $table->string('word_2')->nullable();
            $table->string('word_3')->nullable();      
            $table->string('word_4')->nullable(); 
            $table->string('word_5')->nullable(); 
            $table->string('word_6')->nullable(); 
            $table->string('word_7')->nullable(); 
            $table->string('word_8')->nullable(); 
            $table->string('word_9')->nullable();       
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
        Schema::dropIfExists('memory_test');
    }
}
