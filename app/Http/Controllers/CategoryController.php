<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;
class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view("category.index",['category'=>$category]);
}

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validData=$request->validate([
            'name'=>"required|min:6|max:255"
        ]);
        $cat= new Category();
        $cat->name=$request->input("name");
        $cat->save();
        Session::flash("status","Category inserted");
        return  redirect()->route("category.index");
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $cat=Category::find($id);
        return view("category.edit",['cat'=>$cat]);
    }

    public function update(Request $request, $id)
    {
        $validData=$request->validate([
            'name'=>"required|min:6|max:255"
        ]);
        $cat= Category::find($id);
        $cat->name=$request->input("name");
        $cat->save();
        Session::flash("status","Category updated");
        return  redirect()->route("category.index");
    }

    public function destroy($id)
    {
        $cat=Category::find($id);
        // $cat->posts()->delete();
        $cat->delete();
        if($cat){
            Session::flash("status","Category deleted");
        }

        return redirect()->route("category.index");
    }
}
