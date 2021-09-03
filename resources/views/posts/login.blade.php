@extends("vendor.layout")
@section("title"," Sign-In")
@section("content")

<div class="container">
<div class="h3 text-center pt-3">Form</div>
    <div class="row">
        <div class="col-10 mx-auto py-4">
            <form action="">
            <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Select Country</label>
                <select class="form-control" name="country" id="country" >
                <option value="">Select</option>
                
                @foreach($cots as $cot)
                <option data-did="25" value="{{ $cot->id }}">{{ $cot->name }}</option>                
                @endforeach
                </select>
                </div>
                <div class="form-group">
                    <label for="">Select city</label>
                    <select name="city" id="city" class="form-control">
                    <option >Select</option>
                    
                    </select></div>
                <input type="submit" value="Submit" class="btn btn-success btn-block">
                
            </form>
        </div>
    </div>
</div>

@endsection
@section("javascript")
<script>
$(document).ready(function(){
    $("#country").change(function(){
        var code=$(this).val();
        $.ajax({
            url:"getstate/"+code,
            type:"get",
            data:{code:code},
            success:function(data){
                var temp="<option>Select</option>";
                data.forEach((item,index)=>{
                    temp+="<option value='"+item.id+"'>"+item.name+"</option>";
                });
                $("#city").html('');
                $("#city").append(temp);
            }
        });
    })

});
</script>

@endsection

@section("copyright")

<div class="btn my-3 btn-block">Copyright@LaravelBlog.com</div>
@endsection

