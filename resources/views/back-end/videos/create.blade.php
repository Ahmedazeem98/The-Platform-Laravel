@extends('back-end.layouts.app')

@section('page_title')
    {{$page_title}}
@endsection
@section('nav_title')
    {{$nav_title}}
@endsection

@section('content')
    
    <div id="container" style="width:70%;margin:0 left">
        <form action="{{route('videos.store')}}" method = "POST" enctype='multipart/form-data'>
            {{ csrf_field() }}
            
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" placeholder="Enter page name" name="name">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="custom-select" name="cat_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Skills</label>
            <select class="custom-select" multiple name="skills[]" style="height:100px;">
                @foreach($skills as $skill)
                    <option value="{{$skill->id}}">{{$skill->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tags</label>
            <select class="custom-select" multiple name="tags[]" style="height:100px;">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="custom-select" name="published">
                <option value="1">Published</option>
                <option value="0">Hidden</option>
              </select>
        </div>
        <div class="form-group">
            <label>Video Description:</label>
            <input type="text" class="form-control" placeholder="Enter page description" name="description">
        </div>
        <div class="form-group">
            <label>Meta Keywords</label>
            <input type="text" class="form-control" name="meta_keywords"  placeholder="Optional">
        </div>
        <div class="form-group">
            <label>Meta Description</label>
            <input type="text" class="form-control" name="meta_desc"  placeholder="Optional">
        </div>
        <div class="form-group">
            <label>Youtube url</label>
            <input type="url" class="form-control" name="youtube"  placeholder="Video link">
        </div>
        <div class="form-group">
            <label>Video image</label>
            <input type="file" class="form-control-file" name = "image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

@endsection