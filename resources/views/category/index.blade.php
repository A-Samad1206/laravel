@extends("vendor.layout")

@section("title"," Your Latest Post")
@section("content")

<div class="container-fluid">
<div class="row">
    <div class="col-8 px-5 py-3">

    <table class="table">
    <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
    </thead>
    <tbody>
    @foreach($category as $cat)
    <tr>
    <td> {{ $cat->id }} </td>
    <td> {{ $cat->name }} </td>
     <td>
     <form action="{{route("category.destroy",$cat->id)}}" method="POST" > 
     @csrf 
     @method("DELETE")
     <input type="submit" class="btn btn-block btn-sm btn-info" value="Delete">  
    </form>
     </td>
     <td> 
    <a href="{{ route("category.edit",$cat->id) }}" class="btn btn-block btn-sm btn-danger" >Edit</a>    
     </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    <div class="col-4  pr-3 py-4">
    <form class="border bg-light p-4 shadow" action="{{ route("category.store") }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Enter name</label>
            <input type="text" class="form-control form-control-sm" name="name">
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

