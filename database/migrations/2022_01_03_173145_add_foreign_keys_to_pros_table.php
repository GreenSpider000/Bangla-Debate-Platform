<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pros', function (Blueprint $table) {
            $table->foreign(['motionID'], 'pros_ibfk_1')->references(['motionID'])->on('motions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pros', function (Blueprint $table) {
            $table->dropForeign('pros_ibfk_1');
        });
    }
}
