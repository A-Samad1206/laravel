@extends("vendor.layout")
@section("style")
<link href="/css/parsely.css"  rel="stylesheet">
<link href="/css/select2.css" rel="stylesheet">
@endsection


@section("title"," Create New Post")
@section("content")

<div class="container">
<div class="h3 text-center pt-3">Create Post</div>

    <div class="row">
        <div class="col-8 mx-auto py-4">
            <form data-parsley-validate action="{{ route("post.store") }}" method="POST">
            @csrf
            <div class="form-group">
                    <label for="">Title :-</label>
                    
                    <input type="text" name="title" class="form-control" required  >
                    <small class="text-danger">@error('title'){{$message}}@enderror</small>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug">
                    <small class="text-danger">@error('slug'){{$message}}@enderror</small>
                </div>
                <div class="form-group">
                <label for="">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option >Select category</option>
                        @foreach($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tags</label>
                    <select name="tag_id[]" id="tag_id" class="form-control select2-multi" multiple="multiple">
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Post :-</label>
                    <textarea name="body"  id="body"  rows="4" class="form-control" required  ></textarea>
                    <small class="text-danger">@error('body'){{$message}}@enderror</small>
                </div>
                <input type="submit" value="Submit" class="btn btn-success btn-block">
                
            </form>
        </div>
    </div>
</div>

@endsection
@section("javascript")

<script src="/js/parsely.min.js" type="text/javascript"></script>
<script src="/js/select2.min.js" type="text/javascript"></script>
<script>
        $(document).ready(function() { $("#tag_id").select2(); });
</script>
@endsection

@section("copyright")

<div class="btn my-3 btn-block">Copyright@LaravelBlog.com</div>
@endsection