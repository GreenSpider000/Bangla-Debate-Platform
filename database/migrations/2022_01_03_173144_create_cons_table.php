<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cons', function (Blueprint $table) {
            $table->integer('motionID')->index('motionID');
            $table->integer('consID', true);
            $table->text('consTitle')->unique('consTitle');
            $table->text('consDescription');
            $table->integer('consNumber', 2);
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cons');
    }
}
