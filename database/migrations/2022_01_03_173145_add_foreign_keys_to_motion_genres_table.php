<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMotionGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motion genres', function (Blueprint $table) {
            $table->foreign(['genreID'], 'motion genres_ibfk_2')->references(['genreID'])->on('genres')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['motionID'], 'motion genres_ibfk_1')->references(['motionID'])->on('motions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motion genres', function (Blueprint $table) {
            $table->dropForeign('motion genres_ibfk_2');
            $table->dropForeign('motion genres_ibfk_1');
        });
    }
}
