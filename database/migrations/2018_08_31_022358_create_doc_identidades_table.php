<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocIdentidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_identidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->string('abreviatura',10);
            $table->integer('nrodigitos');
            $table->boolean('emp_enable');
            $table->boolean('part_enable');
        });
        Schema::table('empresas', function (Blueprint $table){
            $table->integer('doc_id')->unsigned()->after('razonsocial');
            $table->foreign('doc_id')->references('id')->on('doc_identidades');
        });
        Schema::table('participantes', function (Blueprint $table){
            $table->integer('doc_id')->unsigned()->after('id');
            $table->foreign('doc_id')->references('id')->on('doc_identidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas',function ($table){
            $table->dropForeign(['doc_id']);
        });
        Schema::table('participantes',function ($table){
            $table->dropForeign(['doc_id']);
        });
        Schema::dropIfExists('doc_identidades');
    }
}
