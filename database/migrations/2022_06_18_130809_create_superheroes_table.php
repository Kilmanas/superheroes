<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperheroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superheroes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('intelligence');
            $table->integer('strength');
            $table->integer('durability');
            $table->integer('power');
            $table->integer('combat');
            $table->integer('speed');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('alignment_id');
            $table->string('image_sm_url');
            $table->string('image_lg_url');
            $table->string('aliases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('superheroes');
    }
}
