@extends('back-end.layouts.app')

@section('page_title')
    {{$page_title}}
@endsection
@section('nav_title')
    {{$nav_title}}
@endsection

@section('content')
    
    <div id="container" style="width:70%;margin:0 left  ">
        <form action="{{route('pages.update',['id' => $row])}}" method = "POST">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label>Page Name:</label>
            <input type="text" class="form-control" value="{{$row->name}}" name="name">
        </div>
        <div class="form-group">
            <label>Page Description:</label>
            <input type="text" class="form-control" value="{{$row->description}}" name="description">
        </div>
        <div class="form-group">
            <label>Meta Keywords</label>
            <input type="text" class="form-control" name="meta_keywords"  value="{{$row->meta_keywords}}">
        </div>
        <div class="form-group">
            <label>Meta Description</label>
            <input type="text" class="form-control" name="meta_desc"  value="{{$row->meta_desc}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

@endsection