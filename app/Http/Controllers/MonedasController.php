<?php

namespace App\Http\Controllers;

use App\Moneda;

class MonedasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $monedas=Moneda::all();
        return $monedas;
    }
}
