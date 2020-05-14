@extends('layouts.app')

@section('content')

  <h3 class="display-4"> {{$video->name}} </h3>
  <h4 style="font-weight: lighter">By <strong> {{$video->user->name}} </strong><small>{{$video->created_at->diffForHumans()}}</small></h4>
  <hr>
<br>
<button  style="margin-bottom: 5px" href="" class="btn btn-dark" onmouseover="$(this).next('div').fadeIn(1000);return false;" onmouseout="$(this).next('div').fadeOut(1000);return false;">More details</button>
<div style="display: none" class="row">
    <div class="col-md-3 text-center">
      <h5 class="text-center">Description</h5>
      {{$video->description}}
    </div>
    <div class="col-md-3 text-center">
      <h5 class="text-center">Tags</h5>
      @foreach ($video->tags as $tag)
      <span id="badge" class="badge badge-dark">{{$tag->name}}</span>
      @endforeach
    </div>
    <div class="col-md-3 text-center">
      <h5 class="text-center">Skills</h5>
      @foreach ($video->skills as $skill)
      <span id="badge" class="badge badge-dark">{{$skill->name}}</span>
      @endforeach
    </div>
    <div class="col-md-3 text-center">
      <h5 class="text-center">Category</h5>
      <span id="badge" class="badge badge-dark">{{$video->category->name}}</span>
    </div>
  </div>
        <br>
        <div style="margin: 0 auto;">
            @if($youtubeId != false)
    
                <div><iframe width="100%" height="400px" src="https://www.youtube.com/embed/{{$youtubeId}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                </div>
            @else
                <div class="text-center" style="background-color: black">
                    Can't get this video from youtube
                </div>
            @endif
        </div>
        <br>
        <div id="comments" class="card text-center">
            <div class="card-header bg-dark text-white">
              <h5>Comments</h5>
            </div>
            <div class="card-body">
              @foreach($video->comments as $comment)
                <div class="row">
                    <div class="col-md-8 text-left">
                        <a href="{{route('front.profile',['id' => $comment->user->id])}}"> <i class="nc-icon nc-chat-33">{{$comment->user->name}}</i></a>
                    </div>
                    <div class="col-md-4 text-right">
                        <span>
                            <i class="nc-icon nc-calender-60">{{$comment->created_at->diffForHumans()}}</i>
                        </span>
                    </div>
                </div>
                @include('front-end.videos.addComment')
                @if(!$loop->last)
                    <hr>
                @endif
              @endforeach
              
                </div>
            </div>
              @include('front-end.videos.comments')
        </div>

@endsection
