<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedModeratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned moderators', function (Blueprint $table) {
            $table->integer('motionID');
            $table->integer('moderatorID')->index('moderatorID');

            $table->primary(['motionID', 'moderatorID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned moderators');
    }
}
