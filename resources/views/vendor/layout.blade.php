<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/bootstrap.css">
  @yield("style")
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
  <title>Laravel Blog | @yield("title")</title>
</head>


<body>
  <nav class="navbar py-1b navbar-expand-lg navbar-light border bg-light">
  <div class="container">
  <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="/blog">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Sign In</a>
        </li>

        
      </ul>
      <ul class="ml-auto  navbar-nav">
      <li class="  nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#mydropdown" id="navbarDropdown"data-toggle="dropdown"
             data-target="#mydropdown" >
            My Account
          </a>
          <div class="dropdown-menu" id="mydropdown">
          <a class="dropdown-item" href="{{ route("post.index") }}">Posts</a>
          <a class="dropdown-item" href="{{ route("category.index") }}">Category</a>
          <a class="dropdown-item" href="{{ route("tag.index") }}">Tags</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        </ul>
    </div>
    </div>
  </nav>
  
  <div id="content">
  @include("partials._messages")
  @yield("content")
  @yield("copyright")
  </div>
  <script src="/js/jquery.js" type="text/javascript"></script>
  <script src="/js/bootstrap.bundle.js" ></script>
  @yield("javascript")
</body>

</html>