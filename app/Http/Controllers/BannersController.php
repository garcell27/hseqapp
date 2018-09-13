<?php

namespace App\Http\Controllers;

use App\Banner;

class BannersController extends Controller
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
        $banners=Banner::all();
        return $banners;
    }

    //
}
