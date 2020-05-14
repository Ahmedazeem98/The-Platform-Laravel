@extends('layouts.app')

@section('content')
@if(count($videos))
  <h3 class="display-4">Latest Videos</h3>
  <hr>

  
  <div class="row">
        @foreach($videos as $video)
            @include('front-end.shared.video-card')
        @endforeach
  </div>
  
    <div class="d-flex justify-content-center">{{$videos->links()}}</div>
@else
  <h4 class="text-center">No Videos to view</h4>
@endif
@endsection
