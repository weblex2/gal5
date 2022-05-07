<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    //
    function index(){
        $links = Link::all();
        $errors = [];
        $success = [];
        return view('Links.index', compact('links'));
    }

    function store(Request $request){
        $link = new Link;
        $link->link = $request->mylink;
        $res = $link->save();
        $succsess = [];
        $errors = [];
        if ( !$request->mylink) {
            $errors[0] = "Error occoured.";
        }
        else{
            $success[0] = 'Link created successfully.';
        }
        $links = Link::all();
        return redirect()->route('Links.index', compact('links'));
    }
}
