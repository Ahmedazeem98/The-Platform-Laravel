@extends('layouts.app')

@section('content')
@if(count($videos))
  <h3 class="display-4"> {{$skill->name}} Videos</h3>
  <hr>
  <div class="row">
    @foreach($videos as $video)
        @include('front-end.shared.video-card')
    @endforeach
</div>
  
@endif
@endsection
