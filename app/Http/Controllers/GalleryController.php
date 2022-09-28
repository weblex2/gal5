<?php

namespace App\Http\Controllers;

use Storage;
use FFMpeg;
use FFProbe;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryPics;
use Http\Controllers\FileUploadController;


class GalleryController extends Controller
{

    
    public function __construct()
    {
        
    }

    public function index(){
        //$this->createPreviewImageFromVideo();
        $create_user_id = \Auth::id();
        if ($create_user_id) {
            $galleries = Gallery::where('create_user_id' , "=", $create_user_id )->get();
        }
        else{
            $galleries = Gallery::where('public' , "=", 1 )->get();
        }
        if (count($galleries)==0 && \Auth::id()){   
            return redirect()->route("gallery.new");
        }
        else {
            return view("gallery.index", compact('galleries'));        
        }
        
    }

    public function newGallery(){
        return view("gallery.new");
    }

    public function showGallery($gal_id){
        $pagination = 5;
        if (\Auth::id()) {
            $pics = GalleryPics::where('gal_id' , "=", $gal_id )->paginate($pagination);
        }
        else {
            $pics = GalleryPics::where('gal_id' , "=", $gal_id )->where('public', "=", 1)->paginate($pagination);
        }
        /* if (count($pics)==0) {
            return redirect()->route("gallery.edit" , [$gal_id]);
        }   */  
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
        
        $gallery = New Gallery();
        $gallery->fill($request->all());
        $res = $gallery->save();
        $gal_id  = $gallery->id;
        return redirect()->route("gallery.edit" , [$gal_id]);
    }

    

    public function showPic($pic_id){

        if (\Auth::id()) {
            $pic  = GalleryPics::find($pic_id);
            if ($pic !== null) {
                $gal_id = $pic->gal_id;
                $prev = GalleryPics::where('id', '<', $pic_id)->where('gal_id', "=", $gal_id)->max('id');
                $next = GalleryPics::where('id', '>', $pic_id)->where('gal_id', "=", $gal_id)->min('id');
            }    
        }
        else {
            $pic  = GalleryPics::where('id','=', $pic_id)->where('public',"=",1)->firstorfail();
            if ($pic !== null) {
                $gal_id = $pic->gal_id;
                $prev = GalleryPics::where('id', '<', $pic_id)
                                    ->where('gal_id', "=", $gal_id)
                                    ->where('public', "=", 1)
                                    ->max('id');
                $next = GalleryPics::where('id', '>', $pic_id)
                                    ->where('gal_id', "=", $gal_id)
                                    ->where('public', "=", 1)
                                    ->min('id');
            }                    
        }

        
        
        return view("gallery.showpic2", compact('pic','prev','next'));
    }

    public function deletePic(Request $request){
        $id = $request->all()['pic_id'];
        $pic  = GalleryPics::find($id);
        $pic->delete();
        return redirect()->back()
            ->with('success', 'File deleted successfully');
    }

    public function createPreviewImageFromVideo(){
        
       
        
        $file = Storage::url('gal/1/2022_08_17_IMG_3348.MOV');
        $ffprobe = FFMpeg\FFProbe::create();
        $thumbnail = 'thumbnail.png';
        $ffmpeg = \FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => '/vendor/php-ffmpeg/php-ffmpeg/src/FFMpeg/ffmpeg',
            'ffprobe.binaries' => '/vendor/php-ffmpeg/php-ffmpeg/src/ffprobe' 
        ]);
        #$video = $ffmpeg->open($movie);
        #$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(2));
        #$frame->save($thumbnail);
        echo '<img src="'.$thumbnail.'">';
    }

}
