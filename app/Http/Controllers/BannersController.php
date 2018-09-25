<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

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

    public function create(Request $request){
        $banner=new Banner();
        $banner->save();
        return $banner;
    }

    public function show($id){
        $banner=Banner::find($id);
        return $banner;
    }
    public function update($id){
        $banner=Banner::find($id);
        $banner->save();
        return $banner;
    }
    public function destroy($id){
        $banner=Banner::find($id);
        $banner->delete();
    }



}
