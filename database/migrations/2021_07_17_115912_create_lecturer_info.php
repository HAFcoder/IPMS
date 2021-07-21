<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturerInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer_info', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lect_id');
            $table->string('lecturerID');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('telephone',14);
            $table->unsignedInteger('faculty_id');
            $table->string('position');
            $table->foreign('faculty_id')->references('id')->on('faculties');
            $table->foreign('lect_id')->references('id')->on('lecturers')->onDelete('cascade');
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
        Schema::dropIfExists('lecturer_info');
    }
}
