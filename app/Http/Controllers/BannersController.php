<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;


class BannersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $almacenamiento;
    public function __construct()
    {
        $this->middleware('auth');
        $this->almacenamiento=storage_path('../img/banners/');
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
            $nombre='banner_'.time().'.'.$imgbanner->getClientOriginalExtension();
            //$imgbanner->move($this->almacenamiento.'temp',$nombre);
            $manager= new ImageManager(array('driver'=>'gd'));
            $img=$manager->make($imgbanner)->resize(1280,500)->save($this->almacenamiento.$nombre);
            $banner->nombreurl=$nombre;
            $banner->titulo='';
            $banner->detalle='';
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
    public function update($id,Request $request){
        $banner=Banner::find($id);
        $banner->titulo=$request->input('titulo');
        $banner->detalle=$request->input('detalle');
        $banner->save();
        return $banner;
    }

    /**
     * @param $id
     * @return string
     * @throws \Exception
     */
    public function destroy($id){
        $banner=Banner::find($id);
        $orden=$banner->orden;
        unlink(storage_path('../img/banners/'.$banner->nombreurl));
        //Storage::delete('../img/banners'.$file);
        $banner->delete();
        $bannerSigs=Banner::where('orden','>',$orden)->get();
        foreach ($bannerSigs as $b){
            $b->orden--;
            $b->save();
        }
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
