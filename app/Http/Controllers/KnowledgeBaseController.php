<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KnowledgeBase;
class KnowledgeBaseController extends Controller
{
    public function index(){
        $kb = KnowledgeBase::all();
        return view('kb.index', compact('kb'));
    }

    public function new(){
        return view('kb.new');
    }

    public function create(Request $request){
        dump($request);
        $kb = new KnowledgeBase();
        $kb->fill($request->all());
        dump ($kb);
        $kb->save();
        return redirect()->route('kb.index');
    }

    public function edit($id){
        $kb = KnowledgeBase::find($id);
        return view('kb.edit', compact('kb'));
    }

    public function update(Request $request){
        $id = $request->all()['id'];
        echo $id;
        $kb = KnowledgeBase::find($id);
        $kb->fill($request->all());
        $kb->update();
        return redirect()->route('kb.index');
    }

    public function show(Request $request){
        $req  = $request->all();
        $topic  = $req['topic'];
        $kb = KnowledgeBase::where('topic', 'like', '%'.$topic.'%')->get();
        return view('kb.show', compact('kb'));
    }

    public function detail($id){
        $kb = KnowledgeBase::find($id);
        return view('kb.detail', compact('kb'));
    }
}
