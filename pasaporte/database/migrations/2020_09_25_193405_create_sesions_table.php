<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //clase_user
        Schema::create('sesions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clase_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            //A student can take the same class multiple times. 
            //$table->unique(['clase_id', 'user_id']);
            $table->foreign('clase_id')
                ->references('id')
                ->on('clases')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sesions');
    }
}
