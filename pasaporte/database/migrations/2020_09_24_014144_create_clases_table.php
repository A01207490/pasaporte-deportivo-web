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
