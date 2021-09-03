<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
use Session;
class TagController extends Controller
{
    public function index()
    {
        $tags=Tags::all();
        return view("tags.index",['tags'=>$tags]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name'=>"required|max:255|unique:Tags,name"
        ]);
        $tag=new Tags();
        $tag->name=$request->name;
        $tag->save();
        Session::flash("status","Tag created");
        return redirect()->route("tag.index");
    }

    public function show($id)
    {
        $tag=Tags::find($id);
        return view("tags.show",['tag'=>$tag]);
    }

    public function edit($id)
    {
        $tag=Tags::find($id);
        return view("tags.edit",['tag'=>$tag]);
    }

    public function update(Request $request, $id)
    {
        $validateData=$request->validate([
            'name'=>"required|max:255|unique:Tags,name"
        ]);
        $tag=Tags::find($id);
        $tag->name=$request->name;
        $tag->save();
        Session::flash("status","Tag updated");
        return redirect()->route("tag.index");
    }

    public function destroy($tag)
    {
        $tag=Tags::find($tag);
        $tag->posts()->detach();
        $res=$tag->delete();
        if($res){
            Session::flash("status","Data deleted");            
        }
        return redirect()->route("tag.index");
    }
}