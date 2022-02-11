<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInternshipColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('internships', function (Blueprint $table) {
            $table->string('job_scope')->nullable();
            $table->double('allowance', 8, 2)->nullable();
            $table->string('orf_file')->nullable();
            $table->string('rdn_file')->nullable();
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
            $table->string('job_scope')->nullable();
            $table->double('allowance', 8, 2)->nullable();
            $table->string('orf_file')->nullable();
            $table->string('rdn_file')->nullable();
        });
    }
}
