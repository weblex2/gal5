<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryPics;
use Http\Controllers\FileUploadController;


class GalleryController extends Controller
{
    public function index(){
        $create_user_id = \Auth::id();
        #if ($create_user_id) {
            $galleries = Gallery::where('create_user_id' , "=", $create_user_id )->get();
        #}
        #else{
        #    $galleries = Gallery::where('public' , "=", 1 )->get();
        #}
        if (count($galleries)==0){   
            $galleries = [];
            return redirect()->route("gallery.new", compact('galleries'));
        }
        return view("gallery.index", compact('galleries'));
    }

    public function newGallery($status = null){
        if ($status == null) {
            $status = [];
        }    
        return view("gallery.new", compact('status'));
    }

    public function showGallery($gal_id){
        $pagination = 5;
        $pics = GalleryPics::where('gal_id' , "=", $gal_id )->paginate($pagination);
        return view("gallery.showgallery", compact('pics', 'gal_id', 'pagination'));
    }

    public function editGallery($gal_id){
        $gallery = Gallery::find($gal_id )->first();
        $pics = GalleryPics::where('gal_id' , "=", $gal_id )->get();
        return view("gallery.edit", compact('pics', 'gal_id'));
    }

    public function saveGallery($gal_id){
        return redirect()->route("gallery.show" , [$gal_id]);
    }

    public function createGallery(REQUEST $request){
        dump($request->all());
        $gallery = New Gallery();
        $gallery->fill($request->all());
        $res = $gallery->save();
        $gal_id  = $gallery->id;
        return redirect()->route("gallery.edit" , [$gal_id]);
    }

    

    public function showPic($pic_id){
        $pic  = GalleryPics::find($pic_id);
        $gal_id = $pic->gal_id;
        $prev = GalleryPics::where('id', '<', $pic_id)->where('gal_id', "=", $gal_id)->max('id');
        $next = GalleryPics::where('id', '>', $pic_id)->where('gal_id', "=", $gal_id)->min('id');
        return view("gallery.showpic2", compact('pic','prev','next'));
    }

}
