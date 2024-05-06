<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompleteapplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completeapplications', function (Blueprint $table) {
            $table->id();
            $table->string('reg_number');
            $table->string('gender1')->nullable();
            $table->string('gender2')->nullable();
            $table->string('firm_name');
            $table->string('academic_year');
            $table->string('action');
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
        Schema::dropIfExists('completeapplications');
    }
}
