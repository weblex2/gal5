<?php

namespace App\Http\Controllers;

use Storage;
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
       
        $create_user_id = \Auth::id();
        if ($create_user_id) {
            $galleries = Gallery::where('create_user_id' , "=", $create_user_id )->get();
        }
        else{
            $galleries = Gallery::where('public' , "=", 1 )->get();
        }
        #if (count($galleries)==0 && \Auth::id()){   
        #    return redirect()->route("gallery.new");
        #}
        #else {
            return view("gallery.index", compact('galleries'));        
        #}
        
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
        return view("gallery.showgallery", compact('pics', 'gal_id', 'pagination'));
    }

    public function editGallery($gal_id){
        $gallery = Gallery::find($gal_id );
        $pics = GalleryPics::where('gal_id' , "=", $gal_id )->get();
        return view("gallery.edit", compact('pics', 'gal_id', 'gallery'));
    }

    public function saveGallery(Request $request){
        $req = $request->all();
        $gal_id = $req['gal_id'];
        $gal  = Gallery::find($gal_id);
        
        if (!isset($req['public'])) {
            $req['public']=0;
        }
        else{
            $req['public']=1;
        }
        $gal->fill($req);
        dump($req);
        dump($gal);
        $gal->update();
        return redirect()->route("gallery.edit" , [$gal_id]);
    }

    public function setGalleryBackground(request $request){
        $id  = $request->all()['pic_id'];
        $pic = GalleryPics::find($id);
        $file_name = $pic->file_name;
        $gallery = Gallery::find($pic->gal_id);
        $gallery->background_pic = $file_name;
        $gallery->update();
        return json_encode(['success', 1]);
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
        $gal_id = $pic->gal_id;
        $hash = $pic->hash;
        $filename = $pic->file_name;
        $pic->delete();
        $res = Storage::disk('public')->delete('gal/'.$gal_id.'/large_photos/'.$hash);
        $res = Storage::disk('public')->delete('gal/'.$gal_id.'/medium_photos/'.$hash);
        $res = Storage::disk('public')->delete('gal/'.$gal_id.'/original_photos/'.$hash);
        $res = Storage::disk('public')->delete('gal/'.$gal_id.'/tiny_photos/'.$hash);
        $res = Storage::disk('public')->delete('gal/'.$gal_id.'/'.$filename);
        return redirect()->back()
            ->with('success', 'File deleted successfully');
    }

    public function editPic($id){
        $pic  = GalleryPics::find($id);
        return view('gallery.editpic', compact('pic') );
    }
    

}
