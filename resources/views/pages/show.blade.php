@extends("vendor.layout")

@section("title"," $post->title")
@section("content")
<?php //print_r($post); ?>
<div class="container">
    <div class="row  py-3">
        <div class="col-8  py-4">
        <div class="h3"> {{ $post->title }} </div>
        <div class="p"> {!! $post->body !!} 
        <p class="badge">Published in :-  {{ $post->category->name }} </p>
        </div>    
        </div>

        <div class="col-4">
            <div class="h2">Related Posts</div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mx-auto">
        @foreach($post->comments as $comment)
        <?php // echo "<pre>";  print_r($comment); echo "</pre>"; ?>
            <div class="media">
            <div class="media-body">
            <h5>{{ $comment->name }} <span class="badge badge-pill badge-primary">{{ $comment->email }}</span> </h5>
           <p class="small" > {{ $comment->body }}</p>
            </div>
            </div>

        @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-8 mx-auto shadow border-bg bg-light" >
            <form action="{{ route("comment.store") }}" class="form-group" method="post">
                @csrf
                <label for="">Name</label>
                <input type="text" name="name" class="form-control form-control-sm">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control form-control-sm mb-2">
                <textarea name="body" class="form-control"  rows="5">Write commennts</textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}">    
                <input type="submit" value="Submit comment" class=" mt-3 btn btn-primary btn-sm btn-block">
            </form>
        </div>
    </div>
</div>
@endsection
@section("copyright")
<div class="btn my-3 btn-block">Copyright@LaravelBlog.com</div>
@endsection