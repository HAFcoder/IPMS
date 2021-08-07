<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogbooktestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbooktests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('week');
            $table->text('monday');
            $table->text('tuesday');
            $table->text('wednesday');
            $table->text('thursday');
            $table->text('friday');
            $table->text('saturday');
            $table->text('sunday');
            $table->string('status');
            $table->date('date');
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
        Schema::dropIfExists('logbooktests');
    }
}
