<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
class PostController extends Controller
{
    public function index()
    {
        $posts=Posts::Paginate(5);
        return view("posts.index",["posts"=>$posts]);
    }

    public function create()
    {
        $tags=Tags::all();
        $cat=Category::all();
        return view("posts.create",['cats'=>$cat,'tags'=>$tags]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            "category_id"=>"required|integer",
            'slug'=>'required|alpha_dash|min:6|max:255|unique:Posts,slug',
        ]);
        $post= new Posts();
            $post->slug=$request->slug;
            $post->title=$request->title;
            $post->category_id=$request->category_id;
            $post->body=$request->body;
            $post->save();    
            if(isset($request->tag_id)){
                $post->tags()->sync($request->tag_id,false);
            }    
            Session::flash("status","Data submitted");
            return redirect()->route("post.index");
    }

    public function show($id)
    {
        $post=Posts::find($id);
        return view("posts.show",['post'=>$post]);
    }

    public function edit($post)
    {
        $tags=Tags::all();
        $cat=Category::all();
        $post=Posts::find($post);

        // return view("posts.create",['cats'=>$cat]);
        return  view("posts.edit",['cats'=>$cat,'post'=>$post,'tags'=>$tags]);
    }

    public function update(Request $request,$id)
    {
        $id=$request->input("id_edit");
        $post=Posts::find($id);
        if($post->slug==$request->input("slug")){
            $validate=$request->validate([
                "title"=>"required",
                "body"=>"required",
                "category_id"=>"required|integer",
                ]);
        }
        else{
            $validate=$request->validate([
                "title"=>"required",
                "body"=>"required",
                "category_id"=>"required|integer",
                'slug'=>'required|alpha_dash|min:6|max:255|unique:Posts,slug',
            ]);
            $post->slug=$request->input("slug");    
        }
        $post->title=$request->input('title');
        $post->category_id=$request->input('category_id');
        $post->body=$request->input('body');
        $res=$post->save();
        if(is_array($request->tag_id)){
            $post->tags()->sync($request->tag_id);
        }
        else{
            $post->tags()->sync(array());
        }
        if($res){
            Session::flash("status","Data updated");            
        }
        return  redirect()->route("post.index");
    }

    public function destroy($id)
    {
        $post=Posts::find($id);
        // $cmnts_posts=DB::table('comments')->where("posts_id",$id)->get();
        $cmnts_posts=$post->comments()->delete();
        $res=Posts::destroy($id);
        if($res){
            Session::flash("status","Data deleted");            
        }
        // $post->tags()->sync(array());
        $post->tags()->detach();

        return  redirect()->route("post.index");
    }
}
