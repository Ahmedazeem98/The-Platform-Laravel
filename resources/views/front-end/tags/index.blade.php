@extends('layouts.app')

@section('content')
@if(count($videos))
  <h3 class="display-4"> {{$skill->name}} Videos</h3>
  <hr>
  @include('front-end.shared.video-row')
@endif
@endsection
