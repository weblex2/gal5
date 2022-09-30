<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KnowledgeBase;
class KnowledgeBaseController extends Controller
{
    public function index(){
        $kb = KnowledgeBase::orderBy('topic', 'ASC')->orderBy('description', 'ASC')->paginate(5);
        return view('kb.index', compact('kb'));
    }

    public function new(){
        return view('kb.new');
    }

    public function create(Request $request){
        $kb = new KnowledgeBase();
        $kb->fill($request->all());
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
        $kb = KnowledgeBase::where('topic', 'like', ''.$topic.'%')->orderBy('topic', 'DESC')->orderBy('description', 'DESC')->paginate(2);
        return view('kb.show', compact('kb'));
    }

    public function detail($id){
        $kb = KnowledgeBase::find($id);
        return view('kb.detail', compact('kb'));
    }

    public function delete(Request $request){
        $req  = $request->all();
        $id  = $req['id'];
        $kb = KnowledgeBase::find($id);
        $kb->delete();
        return redirect()->route('kb.index');
    }
}
