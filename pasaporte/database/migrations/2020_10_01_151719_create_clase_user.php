<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaseUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clase_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
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
        Schema::dropIfExists('clase_user');
    }
}
