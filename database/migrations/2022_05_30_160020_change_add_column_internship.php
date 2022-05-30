<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAddColumnInternship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internships', function (Blueprint $table) {
            $table->dropColumn('emailCount');
            $table->integer('emailDecline')->default('0');
            $table->integer('emailEvaluationForm')->default('0');
            $table->integer('emailPeoForm')->default('0');
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
        Schema::table('internships', function (Blueprint $table) {
            $table->integer('emailCount')->default('0');
            $table->dropColumn('emailDecline');
            $table->dropColumn('emailEvaluationForm');
            $table->dropColumn('emailPeoForm');
        });
    }
}
