@extends("vendor.layout")

@section("title"," Your Latest Post")
@section("content")

<div class="container">

    <div class="row  py-3">
        <div class="col-10 mx-auto  py-4">
        <div class="row py-2">
        <div class="col-6 ">
        <div class="h3 ">All Posts</div>
        </div>
        <div class="col-2 ml-auto">
        <a href="{{ route("post.create") }}" class="btn btn-success btn-sm">Add Post</a>
    </div>

</div>
    <?php // echo "<pre>"; print_r($posts); echo "</pre>"; ?>
        <table class="table my2">
            <thead class="thead-dark" >
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Show Full</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                <td> {{ $post->id }} </td>
                <td> {{ $post->title }} </td>
                <td> 
                <a href="{{ route("post.edit","$post->id") }}" class="btn btn-block btn-success">Edit</a>
                </td>
                <td>
                <form action="{{ route("post.destroy","$post->id") }}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-block btn-success">Delete</button>
                </form>
                 </td>
                <td>
                <a href="{{ route("post.show","$post->id") }}" class="btn btn-block btn-success">Show Full</a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}

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

