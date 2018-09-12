<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNivelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('curso_id')->unsigned();
            $table->decimal('costo',10,2)->nullable();
            $table->boolean('publicitado');
            $table->boolean('estado');
            $table->integer('creador')->nullable();
            $table->integer('actualizador')->nullable();
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('cursos');
        });
        Schema::table('programaciones', function (Blueprint $table){
            $table->integer('nivel_id')->unsigned()->after('curso_id')->nullable();
            $table->foreign('nivel_id')->references('id')->on('niveles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programaciones',function ($table){
            $table->dropForeign(['nivel_id']);
        });
        Schema::dropIfExists('niveles');
    }
}
