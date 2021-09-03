@extends("vendor.layout")

@section("title"," Edit comment")

@section("content")
<div class="container-fluid">
<div class="row">
    <?php //echo "<pre>"; print_r($cmnt); echo "</pre>"; ?>
    <div class="col-5 mx-auto pr-3 py-4">
    <form action="{{ route("comment.update","$cmnt->id") }}" class="border bg-light p-4 shadow" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" readonly name="name" value="{{ $cmnt->name }}" class="form-control form-control-sm">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" readonly name="email" value="{{ $cmnt->email }}"  class="form-control form-control-sm mb-2">
        </div>
        <div class="form-group">
            <textarea name="body" class="form-control"  rows="5"> {{ $cmnt->body }} </textarea>
        </div>
        <div class="form-group">
            <input type="text" name="post_id" value="{{ $cmnt->posts_id }}">
            <input type="submit" value="Submit comment" class=" mt-3 btn btn-primary btn-sm btn-block">
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