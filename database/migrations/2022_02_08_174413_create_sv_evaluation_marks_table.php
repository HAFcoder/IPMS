<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSvEvaluationMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sv_evaluation_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('internship_id');
            $table->string('marks');
            $table->string('comment');
            $table->string('suggestion');
            $table->foreign('internship_id')->references('id')->on('internships');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sv_evaluation_marks');
    }
}
