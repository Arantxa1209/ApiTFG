<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDenominationTableColumnNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('denomination_test', function (Blueprint $table) {
            $table->string('word_1', 100)->nullable()->change();
            $table->string('word_2', 100)->nullable()->change();
            $table->string('word_3', 100)->nullable()->change();
            $table->string('word_4', 100)->nullable()->change();
            $table->string('word_5', 100)->nullable()->change();
            $table->string('word_6', 100)->nullable()->change();
            $table->string('word_7', 100)->nullable()->change();
            $table->string('word_8', 100)->nullable()->change();
            $table->string('word_9', 100)->nullable()->change();
            $table->string('word_10', 100)->nullable()->change();
            $table->string('word_11', 100)->nullable()->change();
            $table->string('word_12', 100)->nullable()->change();
            $table->string('word_13', 100)->nullable()->change();
            $table->string('word_14', 100)->nullable()->change();
            $table->string('word_15', 100)->nullable()->change();
            $table->string('word_16', 100)->nullable()->change();
            $table->string('word_17', 100)->nullable()->change();
            $table->string('word_18', 100)->nullable()->change();
            $table->string('word_19', 100)->nullable()->change();
            $table->string('word_20', 100)->nullable()->change();     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
