@extends("vendor.layout")

@section("title"," Edit Tags")
@section("content")

<div class="container-fluid">
<div class="row">
    <div class="col-4 mx-auto pr-3 py-4">
    <form class="border bg-light p-4 shadow" action="{{ route("tag.update","$tag->id") }}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="">Edit tag</label>
            <input type="text" value="{{ $tag->name }}" class="form-control form-control-sm" name="name">
            <input type="submit" value="Submit" class="btn btn-sm btn-block mt-3 btn-success">
        </div>
    </form>
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