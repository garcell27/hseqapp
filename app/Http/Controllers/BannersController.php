<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $banners=Banner::orderBy('orden')->get();
        return $banners;
    }

    public function create(Request $request){
        $banner=new Banner();
        if($request->hasFile('banner')){
            $nbanner=Banner::all()->count();
            $usuario=$request->user();
            $imgbanner=$request->file('banner');
            $nombre=time().'.'.$imgbanner->getClientOriginalExtension();
            $destinationPath = storage_path('../img/banners');
            $imgbanner->move($destinationPath,$nombre);
            $banner->nombreurl='http://localhost/hseqapp/img/banners/'.$nombre;
            $banner->titulo=$request->input('titulo');
            $banner->detalle=$request->input('detalle');
            $banner->orden=$nbanner+1;
            $banner->creador=$usuario->id;
            $banner->actualizador=$usuario->id;
            $banner->save();
            return $banner;
        }

    }

    public function show($id){
        $banner=Banner::find($id);
        return $banner;
    }
    public function update($id){
        $banner=Banner::find($id);

        //$banner->save();
        return $banner;
    }

    /**
     * @param $id
     * @return string
     * @throws \Exception
     */
    public function destroy($id){
        $banner=Banner::find($id);
        $num=strlen('http://localhost/hseqapp/img/banners/');
        $file= substr($banner->nombreurl,$num);
        //unlink(storage_path('../img/banners'.$file));
        Storage::delete('../img/banners'.$file);
        $banner->delete();
        return 'ok';
    }

    public function orden(Request $request){
        $idini=$request->input('idini');
        $idfin=$request->input('idfin');
        $bannerini=Banner::find($idini);
        $bannerfin=Banner::find($idfin);
        $ordenini=$bannerini->orden;
        $ordenfin=$bannerfin->orden;
        $bannerini->orden=$ordenfin;
        $bannerfin->orden=$ordenini;
        $bannerini->save();
        $bannerfin->save();
        $banners=Banner::orderBy('orden')->get();
        return $banners;
    }



}
