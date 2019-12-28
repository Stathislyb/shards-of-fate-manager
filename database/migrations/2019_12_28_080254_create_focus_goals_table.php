<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFocusGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('focus_goals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('focus_id')->unsigned();
            $table->text('description')->nullable();
            $table->integer('goal_weeks')->default(0);
            $table->integer('spend_weeks')->default(0);
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
        Schema::dropIfExists('focus_goals');
    }
}
