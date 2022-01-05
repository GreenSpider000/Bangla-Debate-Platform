<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAssignedModeratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assigned moderators', function (Blueprint $table) {
            $table->foreign(['moderatorID'], 'assigned moderators_ibfk_3')->references(['moderatorID'])->on('moderators')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['motionID'], 'assigned moderators_ibfk_2')->references(['motionID'])->on('motions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assigned moderators', function (Blueprint $table) {
            $table->dropForeign('assigned moderators_ibfk_3');
            $table->dropForeign('assigned moderators_ibfk_2');
        });
    }
}
