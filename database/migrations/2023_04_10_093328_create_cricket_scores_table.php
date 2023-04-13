<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cricket_scores', function (Blueprint $table) {
            $table->id();
            $table->integer('battingTeam_id');
            $table->integer('bowlingTeam_id');
            $table->integer('match_id');
            $table->integer('run')->nullable();
            $table->integer('wicket')->nullable();
            $table->integer('extra')->nullable();
            $table->integer('ball')->nullable();
            $table->integer('batsman_id');
            $table->integer('bowler_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cricket_scores');
    }
};
