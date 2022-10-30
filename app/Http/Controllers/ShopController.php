<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopArticles;
use App\Models\ShopArticleDetails;
use App\Models\ShopArticlePrices;
use GuzzleHttp\Psr7\Request as Psr7Request;

class ShopController extends Controller
{


    public function index(){
        $articles = ShopArticles::all();
        return view('shop.index', compact('articles'));
    }

    public function showArticle($id){
        #session()->forget('cartItems');
        #session()->forget('cartItemsCnt');
        $article = ShopArticles::find($id);
        $article->load('details');
        return view('shop.showArticle', compact('article'));
    }

    public function add2cart(Request $request){
        $req = $request->all();
        $article_id = $req['article_id'];
        $price = ShopArticlePrices::where('shop_articles_id', "=" ,$article_id )->where('amount',"=",1)->first();
        $articlePrice = $price->price;
        $article = ShopArticles::find($article_id);
        $quantity = $req['quantity'];
        $articleAmount = $quantity * $price->price; 
        
        // Update Session
        $cartItemsCnt = session()->get('cartItemsCnt', 0);
        $cartItemsCnt += $quantity; 
        $cartItems = $request->session()->get('cartItems', []);
        $cartItems[] = [
            'article_id' => $article->id,
            'name' => $article->name,
            'quantity' => $quantity,
            'price_per_item' => $articlePrice,
            'img' => $article->image
        ];
        session()->put('cartItems', $cartItems);
        session()->put('cartItemsCnt', $cartItemsCnt);
        return  redirect()->route('shop.showcart');
    }

    public function showcart(){
        $cart = session()->get('cartItems', []);
        $totalAmount = 0;
        $totalArticleCnt = 0;
        foreach($cart as $i => $item) {
           $totalAmount += $item['price_per_item'] * $item['quantity'];    
           $totalArticleCnt += $item['quantity']; 
        }
        return view('shop.showcart', compact('totalAmount','totalArticleCnt'));
    }

    public function deleteItemFromCart(Request $request){
        $req            = $request->all();
        $idx            = $req['item'];
        $cartItems      = session()->get('cartItems', []);
        $cartItemsCnt   = session()->get('cartItemsCnt', 0);
        $quantity       = $cartItems[$idx]['quantity'];
        $name           = $cartItems[$idx]['name'];
        $article_id     = $cartItems[$idx]['article_id'];
        unset($cartItems[$idx]);
        $cartItemsCnt = $cartItemsCnt - $quantity; 
        $cart = session()->put('cartItems', $cartItems);
        $cart = session()->put('cartItemsCnt', $cartItemsCnt);
        $totalAmount = 0;
        foreach ($cartItems as $i => $item) {
            $totalAmount += $item['price_per_item'] * $item['quantity'];
        }
        //print_r($req['item']);
        $response['article_id'] = $article_id;
        $response['wk_cnt'] = $cartItemsCnt;
        $response['wk_name'] = $name;
        $response['wk_totalAmount'] = $totalAmount;
        echo json_encode($response);
    }

    public function search(Request $request){
        $req = $request->all();
        $search  = $req['search'];
        $articles= ShopArticles::where('description', 'like', '%'.$search."%")->get();
        return view('shop.search', compact('articles'));
    }
}
