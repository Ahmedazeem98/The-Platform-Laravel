@extends('back-end.layouts.app')

@section('page_title')
    {{$page_title}}
@endsection

@section('nav_title')
    {{$nav_title}}
@endsection

@section('content')

<div id="container" style="width:70%;margin:0 left  ">
    <form action="{{route('users.store')}}" method = "POST">
        {{ csrf_field() }}
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Enter username" name="name">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" aria-describedby="emailHelp" name="email"  placeholder="Enter Email">
    </div>
    <div class="form-group">
        <label>Group</label>
        <select class="custom-select" name="group">
            <option value="admin">Admin</option>
            <option value="user">user</option>
        </select>
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Enter Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    

@endsection