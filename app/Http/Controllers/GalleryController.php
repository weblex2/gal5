<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryPics;
use Http\Controllers\FileUploadController;
//use jamesHeinrich\getid3;
//use Owenoj\LaravelGetId3\GetId3;

class GalleryController extends Controller
{
    public function index(){
        $create_user_id = \Auth::id();
        $galleries = Gallery::where('create_user_id' , "=", $create_user_id )->get();
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
        return view("gallery.show", compact('pics', 'gal_id'));
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

    private function getLocation($lat,$lon){
        #$lon=-75.64090833333334;
        #$lat=6.159527777777778;
        #$res = $this->getLocation($lat,$lon);
        $url= "https://nominatim.openstreetmap.org/reverse?lon=-75.64090833333334&lat=6.159527777777778";
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0');
        // $output contains the output string
        $output = curl_exec($ch);
        // close curl resource to free up system resources
        curl_close($ch);    
        $xml = simplexml_load_string($output, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        return $array;
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

        return view("gallery.showpic", compact('pic'));
    }

}
