<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToModeratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('moderators', function (Blueprint $table) {
            $table->foreign(['userID'], 'moderators_ibfk_1')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moderators', function (Blueprint $table) {
            $table->dropForeign('moderators_ibfk_1');
        });
    }
}
