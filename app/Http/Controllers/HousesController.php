<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HousesController extends Controller
{
    function index(){
        return view('houses.index');
    }

    function edit($houseid){
        return view('houses.edit', compact('houseid') );
    }
}
