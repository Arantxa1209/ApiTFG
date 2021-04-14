<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDenominationTableColumnType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('denomination_test', function (Blueprint $table) {
            $table->string('word_1', 100)->change();
            $table->string('word_2', 100)->change();
            $table->string('word_3', 100)->change();
            $table->string('word_4', 100)->change();
            $table->string('word_5', 100)->change();
            $table->string('word_6', 100)->change();
            $table->string('word_7', 100)->change();
            $table->string('word_8', 100)->change();
            $table->string('word_9', 100)->change();
            $table->string('word_10', 100)->change();
            $table->string('word_11', 100)->change();
            $table->string('word_12', 100)->change();
            $table->string('word_13', 100)->change();
            $table->string('word_14', 100)->change();
            $table->string('word_15', 100)->change();
            $table->string('word_16', 100)->change();
            $table->string('word_17', 100)->change();
            $table->string('word_18', 100)->change();
            $table->string('word_19', 100)->change();
            $table->string('word_20', 100)->change();     
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
