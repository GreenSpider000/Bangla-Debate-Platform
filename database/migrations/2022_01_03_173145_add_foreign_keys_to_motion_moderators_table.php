<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMotionModeratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motion moderators', function (Blueprint $table) {
            $table->foreign(['moderatorID'], 'motion moderators_ibfk_2')->references(['moderatorID'])->on('moderators')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['motionID'], 'motion moderators_ibfk_1')->references(['motionID'])->on('motions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motion moderators', function (Blueprint $table) {
            $table->dropForeign('motion moderators_ibfk_2');
            $table->dropForeign('motion moderators_ibfk_1');
        });
    }
}
