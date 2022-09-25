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
        echo $create_user_id;
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
        
        $pics = GalleryPics::where('gal_id' , "=", $gal_id )->paginate(4);
        return view("gallery.showgallery", compact('pics', 'gal_id'));
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
        $pic = GalleryPics::find($pic_id);
        $picFullPath = 'app/public/gal/'.$pic->gal_id."/" . $pic->file_name;
        $src = Storage::url($picFullPath);
        $src = storage_path('app/public/gal/1/2022_07_29_IMG_1786.jpg');
        $exif  = exif_read_data($src);
        $getID3 = new \getID3;
        $ThisFileInfo = $getID3->analyze($src);
        #dump($ThisFileInfo);
        $getID3->CopyTagsToComments($ThisFileInfo);
        #dump($getID3);

        #dump( $getID3->info['jpg']['exif']['GPS']['computed']['latitude'] );

        return view("gallery.showpic2", compact('pic'));
    }

}
