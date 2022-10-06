<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Houses;
use App\Models\HousesArticle;
use App\Models\HouseFormular;
use App\Models\HouseTranslation;

class HouseController extends Controller
{
    public function index(){
        $houses = Houses::all();
        #dump($houses);
        return view('house.index', compact('houses'));
    }

    public function create(){

    }

    public function edit($id){
        $house  = Houses::find($id);
        $house->load('translations');
        $frmHouse = HouseFormular::orderBy('section','ASC')->orderBy('ord','ASC')->get();
        $frmHouse->load('inputs');
        #dump($frmHouse);


        #dump($frmHouse);
        return view ('house.edit', compact('house', 'frmHouse'));
    }

    public function update(Request $request){
        $req = $request->all();
        $house  = Houses::find($req['id']);
        $house->fill($req);
        #dump($req);
        $res = $house->update();
        #dump($res);
        return redirect()->route('house.edit', ['id'=>$req['id']])->with('success','House saved successfully.');;
    }

    public function configHouse(){
        $house  = Houses::find(1);
        $house->load('articles');
        $frmHouse = HouseFormular::orderBy('ord','ASC')->get();
        return view('house.confighouse', compact('house', 'frmHouse'));
    }
}
