<?php

use Illuminate\Support\Facades\Route;
use App\Models\Countries;
use App\Models\States;
Route::get('/', function () { return view('welcome'); });

Route::resource("blog",PagesController::class);

Route::get("/login",function(){
    $cot=Countries::all();
    return view("posts.login",['cots'=>$cot]); });

Route::get("/getstate/{code}",function($code){
        $state=Countries::find($code)->states;
        return $state;
});
// 
/* his one is to retrive single post on basis of slug... */

Route::get("blog/{blog}","PagesController@show")->name("blog.show")->where("slug","[w\d\-\_]+");

Route::resource("post",PostController::class);
Route::resource("tag",TagController::class);

Route::resource("category",CategoryController::class,['except'=>'create']);
Route::resource("comment",CommentsController::class,['except'=>'create']);