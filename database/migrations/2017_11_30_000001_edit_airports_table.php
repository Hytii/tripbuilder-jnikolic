<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditAirportsTable extends Migration
{

    public function up()
    {
        Schema::table('airports', function (Blueprint $table) {
            $table->string('code')
                  ->default(false)
                  ->unique();
        });
    }

    public function down()
    {
        Schema::table('airports', function (Blueprint $table) {
            $table->dropColumn('code');
        });
    }
}