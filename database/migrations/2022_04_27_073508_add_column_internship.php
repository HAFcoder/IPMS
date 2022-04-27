<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInternship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internships', function (Blueprint $table) {
            $table->string('report_link')->nullable();
            $table->integer('emailCount')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internships', function (Blueprint $table) {
            $table->dropColumn('report_link');
            $table->dropColumn('emailCount');
        });
    }
}
