@extends('back-end.layouts.app')
@section('page_title')
    {{$page_title}}
@endsection
@section('nav_title')
    {{$nav_title}}
@endsection

@section('content')
    <div id="container" style="width:70%;margin:0 left  ">
        <form action="{{route('skills.store')}}" method = "POST">
            {{ csrf_field() }}
        <div class="form-group">
            <label>Skill Name:</label>
            <input type="text" class="form-control" placeholder="Enter skill name" name="name">
        </div>
        <h1 class="Ahmed">dsffsf</h1>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

@endsection