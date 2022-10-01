<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispatchController extends Controller
{
    public function index(){
        if ($_SERVER['HTTP_HOST']=="gallery.noppal.de") {
            echo "Gallery";
            return  redirect()->route("gallery.index");
        }
        else {
            echo $_SERVER['HTTP_HOST'];
        }
    }    
}
