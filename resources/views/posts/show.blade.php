@extends("vendor.layout")

@section("title"," Your Latest Post")
@section("content")
<?php 
$link1="https://www.w3schools.com/howto/img_avatar.png";
$link2="https://static.toiimg.com/thumb/msid-76729750,width-640,resizemode-4/76729750.jpg";
$link3="https://www.w3schools.com/howto/img_avatar2.png";
?>
<div class="container">
    <div class="row  py-3">
        <div class="col-8  py-4">
        <div class="h3"> {{ $post->title }} </div>
        <div class="p"> {!! $post->body !!} </div>
        <hr>
        <p>
        @foreach($post->tags as $tag)
        <?php // echo "<pre>"; print_r($tag); echo "</pre>";?>
        <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
        @endforeach
        </p>
        <div class="row">
            <div class="col-10 mx-auto">
            <div class="shadow p-3 my-3">
            {{ $post->comments->count() }} comments 
             </div>
            @foreach($post->comments as $cmnt)
            <div class="media border my-3 p-3">
            <img src="{{ $link1 }}"  width="30" style="border-radius:50%" class="mr-2" alt="">
                <div class="media-body">
                    <h5> {{ $cmnt->name }}</h5>
                    
                    <p> {{ $cmnt->body }} </p>
                    <div class="row">
                        <div class="offset-6 col-2">
                        <a href="{{ route("comment.edit","$cmnt->id") }}" class="btn btn-info btn-block btn-sm">Edit</a>
                        </div>
                        <div class="col-3">
                        <form action="{{ route("comment.destroy","$cmnt->id") }}" method="POST">
                        @csrf
                        @method("DELETE")
                            <input type="submit" value="Delete"  class="btn btn-danger btn-block btn-sm">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
        </div>
        <div class="col-4 p-3 bg-light"  id="side">
   
            <div class="row my-1">
                <div class="col-3">
                Url    
                </div>
                <div class="col-9">

                <input type="text" value="{{ url("/blog/".$post->slug) }}" class="form-control form-control-sm">    
                
                </div>
            </div>
            <div class="row">
                <div class="col-4">Category</div>
                <div class="col-8"> {{ $post->category->name }} </div>
            </div>
            <div class="row">
                <div class="col-4 ">
                    <p class="text-end">Created At</p>
                </div>
                <div class="col-8">
                <dd> {{ date("M j, Y H:i a",strtotime($post->created_at))  }}</dd>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="text-end">Updated At</p>
                </div>
                <div class="col-8">
                <dd> {{ date("M j, Y H:i a",strtotime($post->updated_at))  }}</dd>

                </div>
                </div>
                 <div class="row">
                <div class="col-4">                
                    <a href="{{ route("post.index") }}" class="btn btn-sm btn-block btn-success">Cancel</a>
                </div>
                <div class="col-4">
                    <a href="{{ route("post.edit","$post->id") }}" class="btn btn-sm btn-block btn-success">Edit</a>
                </div>
                <div class="col-4">
                <form action="{{ route("post.destroy","$post->id") }}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-block btn-sm btn-success">Delete</button>
                </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12"><a href="{{ route("post.index") }}" class="btn btn-sm btn-info btn-block">Show All</a></div>
            </div>  
        </div>
       
    </div>
</div>
@endsection
@section("copyright")
<div class="btn my-3 btn-block">Copyright@LaravelBlog.com</div>
@endsection