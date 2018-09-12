<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('edicion')->nullable();
            $table->integer('creador')->nullable();
            $table->integer('actualizador')->nullable();
            $table->timestamps();
        });
        Schema::table('cursos', function (Blueprint $table){
            $table->integer('formato_id')->unsigned()->after('costo')->nullable();
            $table->foreign('formato_id')->references('id')->on('formatos');
        });
        Schema::table('certificados',function(Blueprint $table){
            $table->foreign('formato_id')->references('id')->on('formatos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos',function ($table){
            $table->dropForeign(['formato_id']);
        });
        Schema::table('certificados',function ($table){
            $table->dropForeign(['formato_id']);
        });
        Schema::dropIfExists('formatos');
    }
}
