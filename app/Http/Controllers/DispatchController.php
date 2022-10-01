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
        elseif ($_SERVER['HTTP_HOST']=="kb.noppal.de") {
            echo "Gallery";
            return  redirect()->route("kb.index");
        }
        else {
            echo $_SERVER['HTTP_HOST'];
        }
    }    
}
