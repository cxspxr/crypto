<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('bid');
            $table->integer('bid_size');
            $table->integer('ask');
            $table->integer('ask_size');
            $table->integer('daily_change');
            $table->integer('daily_change_perc');
            $table->integer('last_price');
            $table->integer('volume');
            $table->integer('high');
            $table->integer('low');
            
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
        Schema::dropIfExists('tickers');
    }
}
