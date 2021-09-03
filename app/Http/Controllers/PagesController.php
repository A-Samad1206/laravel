<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PagesController extends Controller
{
    public function index(){
        $posts=Posts::simplepaginate(5);
        return view("pages.index",['posts'=>$posts]);
    }
    public function store(){

    }
    public function show($blog){
        // return $blog;
        $post=Posts::where('slug', $blog)->first();
        
        return view("pages.show",['post'=>$post]);
    }
    
    public function create(){

    }
    public function edit(){

    }
    public function update(){

    }
    public function destroy(){

    }
    
}
