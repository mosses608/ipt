<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->string('supervisor');
            $table->string('student_name');
            $table->string('adm_no');
            $table->string('course');
            $table->string('department');
            $table->string('year');
            $table->string('level');
            $table->string('firm_name');
            $table->string('score1');
            $table->string('score2');
            $table->string('score3');
            $table->string('score4');
            $table->string('score5');
            $table->string('score6');
            $table->string('score7');
            $table->string('score8');
            $table->string('score9');
            $table->string('score10');
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
        Schema::dropIfExists('assessments');
    }
}
