<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('reg_number');
            //$table->string('submit_date');
            $table->string('submit_day');
            $table->string('nu_activities');
            $table->string('task01')->nullable();
            $table->string('task21')->nullable();
            $table->string('task22')->nullable();
            $table->string('task31')->nullable();
            $table->string('task32')->nullable();
            $table->string('task33')->nullable();
            $table->string('task41')->nullable();
            $table->string('task42')->nullable();
            $table->string('task43')->nullable();
            $table->string('task44')->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
