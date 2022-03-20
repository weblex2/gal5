<?php

namespace App\Http\Controllers;

use App\Models\Houses;
use Illuminate\Http\Request;

class HousesController extends Controller
{
    function index(){
        $houses = Houses::latest()->paginate(5);
    
        return view('houses.index',compact('houses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    function edit($houseid){
        return view('houses.edit', compact('houseid') );
    }

    function create(){
        return view('houses.create');
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required',
            'detail' => 'required',            
        ]);
        $req  = $request->all();
        if (!isset($res['active'])){
            $req['active']="";
        }
        Houses::create($req);
        return redirect()->route('houses.index')
                       ->with('success','Product created successfully.');
    }

    function destroy($houseid){

    }

    function show($houseid){
        return $houseid;
    }
}
