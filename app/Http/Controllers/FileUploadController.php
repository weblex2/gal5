<?php

namespace App\Http\Controllers;

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
        $ThisFileInfo = $getID3->analyze($img_path);
        $getID3->CopyTagsToComments($ThisFileInfo);

        $imageUpload = new GalleryPics();
        $imageUpload->file_name = $FileName;
        $imageUpload->gal_id = $gal_id;
        $imageUpload->create_user_id = \Auth::id();
        $imageUpload->save();
        return response()->json(['success' => $FileName, 'img_path' => $img_path, 'exif' => $getID3 ]);
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
        $fileUpload = FileUpload::find($id);
        $fileUpload->delete();
        return redirect()->back()
            ->with('success', 'File deleted successfully');
    }
}