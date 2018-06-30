<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable.php extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('tickets', function (Blueprint $table) {
             $table->increments('id');

             $table->unsignedInteger('user_id');
             $table->unsignedInteger('sell_id');
             $table->boolean('is_open')->default(true);
             $table->mediumText('content');

             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('sell_id')->references('id')->on('sells')->onDelete('cascade');

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
         Schema::dropIfExists('tickets');
     }
}
