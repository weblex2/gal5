<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Houses;
use App\Models\HousesArticle;
use App\Models\HouseFormular;

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
        $house->load('articles');
        #dump($house);

        $frmHouse = HouseFormular::orderBy('ord','ASC')->get();

        #dump($houseArticle);
        return view ('house.edit', compact('house', 'frmHouse'));
    }

    public function update(Request $request){
        $req = $request->all();
        $house  = Houses::find($req['id']);
        $house->fill($req);
        #dump($req);
        $house->update();
        return redirect()->route('house.edit', ['id'=>$req['id']]);
    }

    public function configHouse(){
        $house  = Houses::find(1);
        $house->load('articles');
        $frmHouse = HouseFormular::orderBy('ord','ASC')->get();
        return view('house.confighouse', compact('house', 'frmHouse'));
    }
}
