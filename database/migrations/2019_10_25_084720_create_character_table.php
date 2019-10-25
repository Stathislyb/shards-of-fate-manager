<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('player_id')->unsigned();
            $table->string('name');
            $table->string('race')->nullable();
            $table->string('class')->nullable();
            $table->string('level')->nullable();
            $table->string('unique_thing')->nullable();
            $table->string('focus')->nullable();
            $table->date('start_date')->nullable();
            $table->date('death_date')->nullable();
            $table->text('notes')->nullable();

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
        Schema::dropIfExists('character');
    }
}
