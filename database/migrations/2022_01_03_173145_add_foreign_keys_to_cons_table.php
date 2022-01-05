<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToConsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cons', function (Blueprint $table) {
            $table->foreign(['motionID'], 'cons_ibfk_1')->references(['motionID'])->on('motions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cons', function (Blueprint $table) {
            $table->dropForeign('cons_ibfk_1');
        });
    }
}
