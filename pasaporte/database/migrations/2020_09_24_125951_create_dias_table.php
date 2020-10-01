<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias', function (Blueprint $table) {
            $table->id();
            $table->string('dia_nombre');
            $table->timestamps();
        });

        Schema::create('clase_dia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clase_id');
            $table->unsignedBigInteger('dia_id');
            $table->timestamps();
            $table->unique(['clase_id', 'dia_id']);
            $table->foreign('clase_id')
                ->references('id')
                ->on('clases')
                ->onDelete('cascade');
            $table->foreign('dia_id')
                ->references('id')
                ->on('dias')
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
        Schema::dropIfExists('dias');
    }
}
