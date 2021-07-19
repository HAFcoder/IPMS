<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_info', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stud_id');
            $table->string('studentID');
            $table->string('f_name');
            $table->string('l_name');
            $table->integer('no_ic');
            $table->text('address');
            $table->string('city');
            $table->integer('postcode');
            $table->string('telephone');
            $table->unsignedInteger('programme_id');
            $table->foreign('stud_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('programme_id')->references('id')->on('programmes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_info');
    }
}
