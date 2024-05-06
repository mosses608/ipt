<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('college_name');
            $table->string('college_location');
            $table->string('level');
            $table->string('programme_numbers');
            $table->string('single_program')->nullable();
            $table->string('program1')->nullable();
            $table->string('program2')->nullable();
            $table->string('program31')->nullable();
            $table->string('program32')->nullable();
            $table->string('program33')->nullable();
            $table->string('program41')->nullable();
            $table->string('program42')->nullable();
            $table->string('program43')->nullable();
            $table->string('program44')->nullable();
            $table->string('program51')->nullable();
            $table->string('program52')->nullable();
            $table->string('program53')->nullable();
            $table->string('program54')->nullable();
            $table->string('program55')->nullable();
            $table->string('program61')->nullable();
            $table->string('program62')->nullable();
            $table->string('program63')->nullable();
            $table->string('program64')->nullable();
            $table->string('program65')->nullable();
            $table->string('program66')->nullable();
            $table->string('program71')->nullable();
            $table->string('program72')->nullable();
            $table->string('program73')->nullable();
            $table->string('program74')->nullable();
            $table->string('program75')->nullable();
            $table->string('program76')->nullable();
            $table->string('program77')->nullable();
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
        Schema::dropIfExists('colleges');
    }
}
