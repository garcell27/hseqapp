<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('duracion');
            $table->text('detalle')->nullable();
            $table->boolean('certificacion');
            $table->integer('vigencia');
            $table->decimal('costo',10,2)->nullable();
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
        Schema::dropIfExists('cursos');
    }
}
