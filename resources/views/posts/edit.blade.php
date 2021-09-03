@extends("vendor.layout")
@section("style")
<link href="/css/parsely.css"  rel="stylesheet">
<link href="/css/select2.css" rel="stylesheet">
@endsection
@section("title"," Edit Post")
@section("content")

<div class="container">
<div class="h3 text-center pt-3">Edit Post</div>
    
    <div class="row">
        <div class="col-8 mx-auto py-4">
            <form data-parsley-validate action="{{ route("post.update","$post->id") }}" method="POST">
                @csrf
                @method("patch")
                <div class="form-group">
                    <label for="">Title :- {{ $post->category->id }} </label>
                    <input type="hidden" name="id_edit" value="{{ $post->id }}"> 
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" required  >
                    <small class="text-danger">@error('title'){{$message}}@enderror</small>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" value="{{ $post->slug }}" class="form-control" name="slug">
                    <small class="text-danger">@error('slug'){{$message}}@enderror</small>
                </div>
                <?php $selected=""; ?>

                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option >Select</option>
                        @foreach($cats as $cat)
                        @if($cat->id==$post->category->id)
                            <?php $selected="selected"; ?>
                        @else{
                            <?php $selected=" "; ?>
                        }
                        @endif
                        <option <?php echo $selected;  ?> value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div> 
                
                <?php $selected_2=""; $coll_id=array(); $len=""; $i=0; ?>
                  
                <!-- Retrive all id of tags of posts       -->

                @foreach($post->tags as $tag)
                <?php  $coll_id[]=$tag->id; ?>
                @endforeach
                
                <?php $count=count($coll_id); ?>        
                <div class="form-group">
                    <label for="">Tags</label>    
                    <select name="tag_id[]" id="tag_id" class="form-control" multiple="multiple">
                        <option >Select</option>
                        @foreach($tags as $tag)
                        <option <?php echo $selected_2;  ?> value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div> 
                     
                <div class="form-group">
                    <label for="">Post :-</label>
                    <textarea name="body"  id="body"  rows="4" class="form-control" required  > {{ $post->body }} </textarea>
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
        $(document).ready(function() { 
            $("#tag_id").select2();
            $("#tag_id").select2().val({{ json_encode($post->tags()->allRelatedIds()) }}).trigger("change");
         });
</script>
@endsection

@section("copyright")

<div class="btn my-3 btn-block">Copyright@LaravelBlog.com</div>
@endsection