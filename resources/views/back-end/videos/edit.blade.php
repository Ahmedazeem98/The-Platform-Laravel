@extends('back-end.layouts.app')


@section('page_title')
    Dashboard control
@endsection

@section('nav_title')
    <h2>Dashboard</h2>
@endsection

@section('content')
@if($youTubeId != false)
    <div class="float-right"><iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$youTubeId}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
    </iframe>
    </div>
    
    <img style="clear: both; float-right;" src="{{url('storage/videosCovers/'.$row->image)}}" width="28%" height="300" class="float-right">
@endif

    <div id="container" style="width:70%;margin:10px left">
        <form action="{{route('videos.update',['id' => $row->id])}}" method = "POST" enctype="multipart/form-data">
            {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" value="{{$row->name}}" name="name">
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
                    <option {{in_array($skill->id,$selected_skills) ? 'selected' : ''}} value="{{$skill->id}}">{{$skill->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tags</label>
            <select class="custom-select" multiple name="tags[]" style="height:100px;">
                @foreach($tags as $tag)
                    <option {{in_array($tag->id,$selected_tags) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="custom-select" name="published">
                <option value="1" {{$row->status == '1' ? 'selected' : ''}}>Published</option>
                <option value="0" {{$row->status == '0' ? 'selected' : ''}}>Hidden</option>
              </select>
        </div>
        <div class="form-group">
            <label>Video Description:</label>
            <input type="text" class="form-control" value="{{$row->description}}" name="description">
        </div>
        <div class="form-group">
            <label>Meta keywords:</label>
            <input type="text" class="form-control" value="{{$row->meta_keywords}}" name="meta_keywords">
        </div>
        <div class="form-group">
            <label>Meta description:</label>
            <input type="text" class="form-control" value="{{$row->meta_desc}}" name="meta_desc">
        </div>
        <div class="form-group">
            <label>Youtube url</label>
            <input type="text" class="form-control" name="youtube"  value="{{$row->youtube}}">
        </div>
         <div class="form-group">
            <label>Video image</label>
            <input type="file" class="form-control-file" name = "image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    @include('back-end.comments.create')
    @include('back-end.comments.index')
    </div>
   

@endsection