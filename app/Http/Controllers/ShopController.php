<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopArticles;

class ShopController extends Controller
{
    public function index(){
        $articles = ShopArticles::all();    
        return view('shop.index', compact('articles'));
    }

    public function showArticle($id){
        $article = ShopArticles::find($id);     
        return view('shop.showArticle', compact('article'));
    }
}
