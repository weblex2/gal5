<?php

namespace App\Http\Controllers;

use Http\Controllers\GalleryController; 
use App\Models\GalleryPics;
use Illuminate\Http\Request;

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
        $req = $request->all();
        $gal_id = $req['gal_id'];
        $image = $request->file('file');
        $FileName = $image->getClientOriginalName();
        $image->move(storage_path('app/public/gal/'.$gal_id), $FileName);
        $img_path = 'app/public/gal/'. $gal_id. '/'. $FileName;
        $img_path = storage_path($img_path);    

        $getID3 = new \getID3;
        $thisFileInfo = $getID3->analyze($img_path);

        $lat = $thisFileInfo['jpg']['exif']['GPS']['computed']['latitude'];
        $lon = $thisFileInfo['jpg']['exif']['GPS']['computed']['longitude'];
        $getID3->CopyTagsToComments($thisFileInfo);
        $osm_data  = $this->getLocation($lat,$lon);    

        $imageUpload = new GalleryPics();
        $imageUpload->file_name = $FileName;
        $imageUpload->gal_id = $gal_id;
        $imageUpload->create_user_id = \Auth::id();
        $imageUpload->exif_data = json_encode($thisFileInfo);
        $imageUpload->osm_data = $osm_data;
        $imageUpload->save();
        #return response()->json(['success' => $FileName ]);
        return response()->json(['success' => $FileName, 'img_path' => $img_path, 'exif' => $thisFileInfo ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function show(FileUpload $fileUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function edit(FileUpload $fileUpload)
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
    public function update(Request $request, FileUpload $fileUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileUpload = GalleryPics::find($id);
        $fileUpload->delete();
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
        // close curl resource to free up system resources
        curl_close($ch);    
        #$xml = simplexml_load_string($output, "SimpleXMLElement", LIBXML_NOCDATA);
        #$json = json_encode($xml);
        #$array = json_decode($json,TRUE);
        return $result;
    }
}