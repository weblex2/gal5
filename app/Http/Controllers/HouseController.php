<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Houses;
use App\Models\HousesArticle;
use App\Models\HouseFormular;
use App\Models\HouseTranslation;
use Session;

class HouseController extends Controller
{


    public function index(){
        $languages = ['D','E','F'];
        Session::put('showLanguages', $languages);
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
        $showLanguages = session('showLanguages');
        $house->showLang =  $showLanguages;
        #dump($house);
        #die();

        #dump($frmHouse);
        return view ('house.edit', compact('house', 'frmHouse'));
    }

    public function update(Request $request){
        $req = $request->all();
        $house_id = $req['id'];
        $trans = $req['trans'];

        #dump($req);
        #dump($trans);
        $translatons = HouseTranslation::find($house_id);
        $translatons->fill($trans);
        #dump($translatons);
        foreach($trans as $fieldname => $section){
            echo $fieldname."<br>";
            foreach($section as $key => $value) {

                if (is_numeric($key)) {
                    echo "Key found ->Update -" .$value;
                    $translatons = HouseTranslation::find($key);
                    $translatons->translation = $value;
                    dump($translatons);
                    $translatons->update();
                }
                else{
                    echo "Key new ->Insert";
                    $translatons = new HouseTranslation();
                    $translatons->houses_id = $house_id;
                    $translatons->field = $fieldname;
                    $translatons->language = $key;
                    $translatons->translation = $value;
                    dump($translatons);
                    $translatons->save();

                }

                #dump($translatons);
            }
        }


        $house  = Houses::find($req['id']);
        $house->fill($req);

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
