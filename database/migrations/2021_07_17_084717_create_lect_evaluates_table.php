<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectEvaluatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lect_evaluates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('intern_id');
            $table->json('marks');
            $table->date('created_at');
            $table->foreign('intern_id')->references('id')->on('internships');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lect_evaluates');
    }
}
