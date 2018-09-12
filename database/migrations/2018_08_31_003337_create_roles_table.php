<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table){
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('descripcion',250);
            $table->boolean('estado');
            $table->timestamps();
        });
        Schema::table('users', function ($table){
            $table->integer('role_id')->unsigned()->after('email');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function ($table){
            $table->dropForeign(['role_id']);
        });
        Schema::dropIfExists('roles');
    }
}
