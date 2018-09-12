<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $hasverif=app()->make('hash');

        $username=$request->input('username');
        $password=$request->input('password');
        $login=User::where('username',$username)->first();
        if($login==null){
            $result=false;
        }else{
            if($hasverif->check($password,$login->password)){
                $result=true;
            }else{
                $result=false;
            }
        }
        if($result){
            return $login;
        }else{
            return response('No Autorizado', 401);
        }
    }

    //
}
