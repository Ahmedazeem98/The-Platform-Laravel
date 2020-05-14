@extends('back-end.layouts.app')

@section('page_title')
    {{$page_title}}
@endsection
@section('nav_title')
    {{$nav_title}}
@endsection

@section('content')
    
    <div id="container" style="width:70%;margin:0 left  ">
        <form action="{{route('categories.store')}}" method = "POST">
            {{ csrf_field() }}
            
        <div class="form-group">
            <label>Category Name:</label>
            <input type="text" class="form-control" placeholder="Enter category name" name="name">
        </div>
        <div class="form-group">
            <label>Keywords</label>
            <input type="text" class="form-control" name="meta_keywords"  placeholder="Optional">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="meta_desc"  placeholder="Optional">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

@endsection