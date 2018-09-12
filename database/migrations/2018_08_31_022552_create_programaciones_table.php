<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curso_id')->unsigned();
            $table->integer('empresa_id')->unsigned()->nullable();
            $table->integer('instructor_id')->unsigned()->nullable();
            $table->string('ciudad')->nullable();
            $table->integer('nrodias');
            $table->date('inicio');
            $table->date('fin');
            $table->time('horaini')->nullable();
            $table->time('horafin')->nullable();
            $table->integer('moneda_id')->unsigned();
            $table->decimal('precio',10,2)->nullable();
            $table->integer('creador')->nullable();
            $table->integer('actualizador')->nullable();
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('instructor_id')->references('id')->on('participantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programaciones');
    }
}
