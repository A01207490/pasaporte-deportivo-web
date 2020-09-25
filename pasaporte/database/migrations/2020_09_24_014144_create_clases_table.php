<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->string('clase_nombre');
            $table->time('clase_hora_inicio');
            $table->time('clase_hora_fin');
            $table->unsignedBigInteger('coach_id');
            $table->timestamps();
            $table->foreign('coach_id')
                ->references('id')
                ->on('coaches')
                ->onDelete('cascade');
        });

        //clase_dia
        Schema::create('clase_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clase_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->unique(['clase_id', 'user_id']);
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
        Schema::dropIfExists('clases');
    }
}
