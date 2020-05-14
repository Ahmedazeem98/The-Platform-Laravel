@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div id="container" style="width:70%;margin:0 left" class="alert alert-danger">{{$error}}</div>
    @endforeach
@endif