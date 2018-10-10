<?php

namespace App\Http\Controllers;

use App\Galeria;
use Illuminate\Http\Request;

class GaleriasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->almacenamiento=storage_path('../img/galerias/');
    }
    public function index(){
        $galerias=Galeria::orderBy('created_at','desc')->get();
        return $galerias;
    }

    public function create(Request $request){

    }

    public function update($id,Request $request){

    }

    public function destroy($id){

    }

}
