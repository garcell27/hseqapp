<?php

use Illuminate\Database\Seeder;
use App\Moneda;

class MonedaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moneda=new Moneda();
        $moneda->descripcion='Nuevo Sol';
        $moneda->abreviatura='PEN';
        $moneda->simbolo='S/';
        $moneda->save();
    }
}
