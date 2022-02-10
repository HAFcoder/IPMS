<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalEvaluationMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_evaluation_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('internship_id');
            $table->string('marks');
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
        Schema::dropIfExists('final_evaluation_marks');
    }
}
