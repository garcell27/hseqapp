<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nrodocumento',20);
            $table->string('apellidos');
            $table->string('nombres');
            $table->date('fecha_nacimiento');
            $table->string('email');
            $table->text('telefonos');
            $table->boolean('empleado');
            $table->boolean('estado');
            $table->integer('creador')->nullable();
            $table->integer('actualizador')->nullable();
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
        Schema::dropIfExists('participantes');
    }
}
