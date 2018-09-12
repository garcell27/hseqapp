<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serie');
            $table->integer('correlativo');
            $table->integer('participante_id')->unsigned();
            $table->integer('matricula_id')->unsigned();
            $table->integer('formato_id')->unsigned();
            $table->date('emision');
            $table->date('caducidad');
            $table->integer('creador')->nullable();
            $table->integer('actualizador')->nullable();
            $table->boolean('estado');
            $table->timestamps();

            $table->foreign('matricula_id')->references('id')->on('matriculas');
            $table->foreign('participante_id')->references('id')->on('participantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificados');
    }
}
