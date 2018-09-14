<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursosController extends Controller
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
        $cursos= Curso::all();
        return $cursos;
    }

    public function create(Request $request){
        $curso= new Curso();

    }
    public function show($id){
        $curso=Curso::find($id);
        return $curso;
    }
    public function destroy($id){
        $curso=Curso::find($id);
        $curso->delete();
    }
}
