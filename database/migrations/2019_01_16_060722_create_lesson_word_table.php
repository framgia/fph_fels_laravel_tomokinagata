<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonWordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_word', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lesson_id')->unsigned();
            $table->foreign('lesson_id')->references('id')->on('lesson')->onDelete('cascade');
            $table->integer('word_id')->unsigned();
            $table->foreign('word_id')->references('id')->on('word')->onDelete('cascade');
            $table->integer('word_answer_id')->unsigned();
            $table->foreign('word_answer_id')->references('id')->on('word_answer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_word');
    }
}
