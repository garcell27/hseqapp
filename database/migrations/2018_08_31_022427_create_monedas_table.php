<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monedas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->string('abreviatura',3);
            $table->string('simbolo',10);
        });
        Schema::table('cursos',function (Blueprint $table){
            $table->integer('moneda_id')->unsigned()->after('vigencia')->nullable();
            $table->foreign('moneda_id')->references('id')->on('monedas');
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
            $table->dropForeign(['moneda_id']);
        });
        Schema::dropIfExists('monedas');
    }
}
