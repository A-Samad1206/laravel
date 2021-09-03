@if(session()->has("status"))
<div class="container">
<div class="alert alert-success">
{{ session("status") }}
</div>
</div>
@endif
@if(count($errors)>0)
<div class="container">
<div class="btn btn-success btn-block">
@foreach($errors->all() as $error)
{{ $error }}
@endforeach
</div>
</div>
@endif
