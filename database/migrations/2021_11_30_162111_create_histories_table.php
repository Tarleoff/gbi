<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id('idHistory');
            $table->timestamps();
            $table->unsignedBigInteger('idVideoH');
            $table->foreign('idVideoH')->references('id')->on('videos')->onDelete('CASCADE');
            $table->unsignedBigInteger('idUserH');
            $table->foreign('idUserH')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
