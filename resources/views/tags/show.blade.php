@extends("vendor.layout")

@section("title"," Tags")
@section("content")

<div class="container-fluid">
<div class="row mt-3 ml-3">
    <div class="col-6">
    <div class="h3"> {{ $tag->name }} :- {{ $tag->posts()->count() }} </div>  
    </div>
    <div class="col-1">
        <form action="{{ route("tag.destroy","$tag->id") }}" method="POST">
        @csrf
        @method("delete")
        <input type="submit" value="Delete" class="btn btn-sm btn-block btn-danger"></form>
    </div>    
    <div class="col-1">

    <a href="{{ route("tag.edit","$tag->id") }}" class="btn btn-block btn-info btn-sm ">Edit</a>

    </div>
</div>  
<div class="row">
    <div class="col-8 px-5 py-3">
    <?php  //echo "<pre>"; print_r($tag->posts()); echo "</pre>"; ?>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Post</th>
                <th>Totals</th>
            </tr>
        </thead>
                <tbody>
                    @foreach($tag->posts as $post)
                    <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->body }}</td>
                    <td>@foreach($post->tags as $tag)
                        <span class="badge badge-pill badge-warning">{{ $tag->name }}</span>
                         @endforeach
                     </td>
                    </tr>
                    @endforeach
                </tbody>
            </tr>
    </table>
    </div>
</div>

</div>
<style>
.w-5{
    display:none;
}
</style>

@endsection

 
@section("copyright")

<div class="btn my-3 btn-block">Copyright@LaravelBlog.com</div>
@endsection