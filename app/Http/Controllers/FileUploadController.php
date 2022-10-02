<?php

namespace App\Http\Controllers;

use Http\Controllers\GalleryController; 
use App\Models\GalleryPics;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Image;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $files = GalleryPics::all();
        #return view('files.index', compact('files'))
        #    ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $lat  = 0;
        $lon = 0;
        $req = $request->all();
        $gal_id = $req['gal_id'];
        $image = $request->file('file');

        $original_photo_storage = storage_path('app/public/gal/'.$gal_id.'/original_photos/');
        $large_photos_storage   = storage_path('app/public/gal/'.$gal_id.'/large_photos/');
        $medium_photos_storage  = storage_path('app/public/gal/'.$gal_id.'/medium_photos/');
        $mobile_photos_storage  = storage_path('app/public/gal/'.$gal_id.'/mobile_photos/');
        $tiny_photos_storage    = storage_path('app/public/gal/'.$gal_id.'/tiny_photos/');

        if (!file_exists($original_photo_storage)){
            mkdir($original_photo_storage, 0755, true);
        }

        if (!file_exists($large_photos_storage)){
            mkdir($large_photos_storage, 0755, true);
        }

        if (!file_exists($medium_photos_storage)){
            mkdir($medium_photos_storage, 0755, true);
        }

        if (!file_exists($mobile_photos_storage)){
            mkdir($mobile_photos_storage, 0755, true);
        }

        if (!file_exists($tiny_photos_storage)){
            mkdir($tiny_photos_storage, 0755, true);
        }

        #$photo -> photo = $file->hashName();//give the uploaded photo a hash //name
        
        #$manager = new ImageManager(['driver' => 'imagick']);

        // to finally create image instances
        #$pic = $manager->make($image->getRealPath());
        $pic = Image::make($image->getRealPath());//create a new image //resource from file.This is done by the Intervention Image package
        $FileName = $image->getClientOriginalName();
        $extension = strtoupper(pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION));   
        if (in_array($extension, ["JPG", "PNG", "GIF", "BMP", "WebP"] )) {
            $pic = Image::make($image->getRealPath());
            $h  = $pic->height();
            $w  = $pic->width();
            if ($h<$w) {
                $pic->rotate(-90);
            }
            $hash =  $image->hashName();
            $pic->save($original_photo_storage.$image->hashName(),100)->resize(860, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                ->save($large_photos_storage.$image->hashName(),85)->resize(640, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($medium_photos_storage.$image->hashName(),85)
                ->resize(420, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($mobile_photos_storage.$image->hashName(),85)
                ->resize(10, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                })->blur(1)->save($tiny_photos_storage.$image->hashName(),85);
                $pic->save();
                $exif = $pic->exif();

        }
        else{
           // Video     
        }
        
        $status = $image->move(storage_path('app/public/gal/'.$gal_id), $FileName);
        $img_path = 'app/public/gal/'. $gal_id. '/'. $FileName;
        $img_path = storage_path($img_path);    
        $mime  = mime_content_type($img_path);
        $getID3 = new \getID3;
        $thisFileInfo = $getID3->analyze($img_path);
        $osm_status = false;
        if (isset($thisFileInfo['jpg']['exif']['GPS']['computed'])) {   
            $lat = $thisFileInfo['jpg']['exif']['GPS']['computed']['latitude'];
            $lon = $thisFileInfo['jpg']['exif']['GPS']['computed']['longitude'];
        }    
        elseif (isset($thisFileInfo['quicktime']['comments']['location.ISO6709'][0])) {
            $lla = $thisFileInfo['quicktime']['comments']['location.ISO6709'][0];
            $lla = str_replace('+','|+',$lla);
            $lla = str_replace('-','|-',$lla);
            $lla = str_replace('/','',$lla);
            $lla = explode('|', $lla);
            $lat = str_replace('+','',$lla[1]);
            $lon = str_replace('+','',$lla[2]);
            $alt = $lla[3];
            
        }
        else{
            
        }

        $getID3->CopyTagsToComments($thisFileInfo);
        $osm_data = null;
        if (isset($lat) && isset($lon)) {
            $osm_data  = $this->getLocation($lat,$lon);    
            $osm_status = true;
        }
        
        
        
        $imageUpload = new GalleryPics();
        $imageUpload->file_name = $FileName;
        $imageUpload->gal_id = $gal_id;
        $imageUpload->create_user_id = \Auth::id();
        $imageUpload->exif_data = json_encode($thisFileInfo);
        $imageUpload->osm_data = $osm_data;
        $imageUpload->mimetype = $mime;
        $imageUpload->lon = $lon;
        $imageUpload->hash = $hash;
        $imageUpload->lat = $lat;
        $imageUpload->save();
        $id = $imageUpload->id;
        $timestamp  = date('Y-m-d H:i:s');
        #return response()->json(['success' => $FileName ]);
        return response()->json(['success' => $status, 
                                 'timestamp' => $timestamp,  
                                 'id' => $id, 
                                 'filename' => $FileName, 
                                 'img_path' => $img_path, 
                                 'exif' => $thisFileInfo, 
                                 'osm' => $osm_status ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    
     public function show(FileUploadController $fileUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileUploadController  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function edit(FileUploadController $fileUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    /* public function update(Request $request, FileUpload $fileUpload)
    {
        //
    } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        echo "delete";
        $req = $request->all();
        $pic_id = $req['pic_id'];    
        $fileUpload = GalleryPics::find($pic_id);
        $status = $fileUpload->delete();
        #return response()->json(['success' => $status, 'filename' => $fileUpload]);
        return redirect()->back()
            ->with('success', 'File deleted successfully');
    }

    private function getLocation($lat,$lon){
        $url= "https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=".$lat."&lon=".$lon;
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0');
        // $output contains the output string
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // close curl resource to free up system resources
        curl_close($ch);    
        #$xml = simplexml_load_string($output, "SimpleXMLElement", LIBXML_NOCDATA);
        #$json = json_encode($xml);
        #$array = json_decode($json,TRUE);
        return $result;
    }
}