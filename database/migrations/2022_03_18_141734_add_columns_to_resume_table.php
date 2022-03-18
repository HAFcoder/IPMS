<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->string('experience_title')->after('language')->nullable();
            $table->string('experience_company')->after('language')->nullable();
            $table->string('experience_start')->after('language')->nullable();
            $table->string('experience_end')->after('language')->nullable();
            $table->string('experience_desc')->after('language')->nullable();
            $table->string('education_course')->after('language')->nullable();
            $table->string('education_uni')->after('language')->nullable();
            $table->string('education_start')->after('language')->nullable();
            $table->string('education_end')->after('language')->nullable();
            $table->string('certificate_title')->after('language')->nullable();
            $table->string('certificate_date')->after('language')->nullable();
            $table->string('certificate_desc')->after('language')->nullable();
            $table->string('reference_name')->after('language')->nullable();
            $table->string('reference_company')->after('language')->nullable();
            $table->string('reference_position')->after('language')->nullable();
            $table->string('reference_email')->after('language')->nullable();
            $table->string('reference_phone')->after('language')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->dropColumn('experience_title');
            $table->dropColumn('experience_company');
            $table->dropColumn('experience_start');
            $table->dropColumn('experience_end');
            $table->dropColumn('experience_desc');
            $table->dropColumn('education_course');
            $table->dropColumn('education_uni');
            $table->dropColumn('education_start');
            $table->dropColumn('education_end');
            $table->dropColumn('certificate_title');
            $table->dropColumn('certificate_date');
            $table->dropColumn('certificate_desc');
            $table->dropColumn('reference_name');
            $table->dropColumn('reference_company');
            $table->dropColumn('reference_position');
            $table->dropColumn('reference_email');
            $table->dropColumn('reference_phone');
        });
    }
}
