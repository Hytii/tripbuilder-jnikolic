<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssesmentTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->timestamps();
        });
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');

            $table->timestamps();

        });
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->unsignedInteger('from_id');
            $table->unsignedInteger('to_id');
            $table->unsignedInteger('trip_id');
            $table->timestamps();

            $table->foreign('from_id')
                  ->references('id')
                  ->on('airports');
            $table->foreign('to_id')
                  ->references('id')
                  ->on('airports');
            $table->foreign('trip_id')
                  ->references('id')
                  ->on('trips');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
        Schema::dropIfExists('trips');
        Schema::dropIfExists('airports');
    }
}
