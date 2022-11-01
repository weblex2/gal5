<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispatchController extends Controller
{
    public function index(Request $request){
        #dump($request->server['parameters']);
        #dump ($request->server);
        #dump ($request);
        
        $referer = request()->headers->get('referer');
        #echo $referer;
        #dump ($request->path());

        if ($referer){
            return  redirect()->to($referer);
        }

        #if (isset($_SERVER['HTTP_REFERER'])) {
        #    return  redirect($_SERVER['HTTP_REFERER']);
        #}
        
        if ($_SERVER['HTTP_HOST']=="gallery.noppal.de") {
            return  redirect()->route("gallery.index");
        }
        elseif ($_SERVER['HTTP_HOST']=="kb.noppal.de") {
            return  redirect()->route("kb.index");
        }
        elseif ($_SERVER['HTTP_HOST']=="shop.noppal.de") {
            return  redirect()->route("shop.index");
        }
        else {
           # echo $_SERVER['HTTP_HOST'];
        }
    }    
}
