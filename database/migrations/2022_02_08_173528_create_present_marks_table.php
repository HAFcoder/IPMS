<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('present_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('internship_id');
            $table->string('marks');
            $table->string('comment');
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
        Schema::dropIfExists('present_marks');
    }
}
