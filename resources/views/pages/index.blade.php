@extends("vendor.layout")
@section("title"," Homepage")

@section("content")
<div class="container">
      <div class="row">
        <div class="col-10 py-3 mx-auto">
          <div class="jumbotron  p-3">
            <h1 class="display-5">Hello, world!</h1>
            <!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
              to
              featured content or information.</p> -->
            <hr class="my-1">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
              <a class="btn btn-primary " href="#" role="button">Learn more</a>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-7 offset-1">

         @foreach($posts as $post) 
          <div class="row py-3 ">
            <div class="h4 mr-2">{{$post->title}}</div>
            <p class="my-1"> <small > <i> {{ date("M j, Y h:i a",strtotime($post->created_at))  }}</i></small></p>
            <p>{{ substr(strip_tags($post->body),0,100)  }} <a href="{{ route("blog.show","$post->slug") }}" class="link">Read More.....</a></p>
          </div>
          @endforeach
        </div>
       
       
        
        <div class="col-4 ">
          <div class="row px-4">
          <div class="h2 text-center">SideBar</div>
            <div class="col-12 mt-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, voluptatibus.
            </div>
            <div class="col-12 mt-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, voluptatibus.
            </div>
            <div class="col-12 mt-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, voluptatibus.
            </div>
            <div class="col-12">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, voluptatibus
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="text-center">
          {{ $posts->links() }}
          </div>
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

<div class="btn my-3 btn-block"> <hr> Copyright@LaravelBlog.com</div>
@endsection

