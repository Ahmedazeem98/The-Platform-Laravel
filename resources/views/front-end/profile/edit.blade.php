@extends('layouts.app')

@section('content')

<div id="container" style="width:70%;margin:0 left  ">
    <form action="{{route('front.updateProfile',['id' => $user])}}" method = "POST">
        {{ csrf_field() }}
        
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" value="{{$user->name}}" name="name">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" aria-describedby="emailHelp" name="email"  value="{{$user->email}}">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Enter Password">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</div><!-- /.row -->
  @endsection