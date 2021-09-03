<?php
namespace App\Http\Controllers;
use App\Models\Comments;
use App\Models\Posts;
use Illuminate\Http\Request;
use Session;
class CommentsController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validData=$request->validate([
        'name'=>'required|max:255',
        'email'=>'required|email|max:255',
        'body'=>'required|min:5'
        ]);
        $comment= new Comments();
        $comment->name=$request->name;             
        $comment->email=$request->email;             
        $comment->body=$request->body;
        $comment->approved=true;
        $post=Posts::find($request->post_id);
        $comment->posts()->associate($post);
        $comment->save();
        return view("pages.show",['post'=>$post]);
    }

    public function show(Comments $comments)
    {

    }

    public function edit($comments)
    {
        $cmnts=Comments::find($comments);
        return view("comments.edit",['cmnt'=>$cmnts]);
    }

    public function update(Request $request,$comments)
    {
        $validData=$request->validate([
            'body'=>'required|min:5'
            ]);
            $getPost=Posts::find($request->post_id);
            $comment=Comments::find($comments);
            $comment->body=$request->body;
            $comment->save();
            return view("posts.show",['post'=>$getPost]);
        }

    public function destroy($comments)
    {
        $cmnt=Comments::find($comments);
        $post_id=$cmnt->posts;     
        $cmnt->delete();
        Session::flash("status","Comment deleted");
        return view("posts.show",['post'=>$post_id]);
    }
}