<?php

use Illuminate\Database\Seeder;
use App\DocIdentidad;

class DocIdentidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doc_ruc= new DocIdentidad();
        $doc_ruc->descripcion='Registro Unico del Contribuyente';
        $doc_ruc->abreviatura='RUC';
        $doc_ruc->nrodigitos=11;
        $doc_ruc->emp_enable=1;
        $doc_ruc->part_enable=0;
        $doc_ruc->save();

        $doc_dni= new DocIdentidad();
        $doc_dni->descripcion='Documento Nacional de Identidad';
        $doc_dni->abreviatura='DNI';
        $doc_dni->nrodigitos=8;
        $doc_dni->emp_enable=0;
        $doc_dni->part_enable=1;
        $doc_dni->save();
    }
}
