<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsableToAreasTable extends Migration
{
    public function up()
    {
        Schema::table('areas', function (Blueprint $table) {
            $table->boolean('usable')->default(false);
        });
    }

    public function down()
    {
        Schema::table('areas', function (Blueprint $table) {
            $table->dropColumn('usable');
        });
    }
}
