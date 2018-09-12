<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('programacion_id')->unsigned();
            $table->integer('participante_id')->unsigned();
            $table->integer('nivel_id')->unsigned();
            $table->integer('estado');
            $table->integer('creador')->nullable();
            $table->integer('actualizador')->nullable();
            $table->timestamps();
            $table->foreign('programacion_id')->references('id')->on('programaciones');
            $table->foreign('participante_id')->references('id')->on('participantes');
            $table->foreign('nivel_id')->references('id')->on('niveles');
        });
    }

    /**
     * Reverse the migrations.
     *clea
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
