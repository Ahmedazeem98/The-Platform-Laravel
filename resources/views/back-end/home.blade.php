@extends('back-end.layouts.app')
@section('page_title')
{{$page_title}}
@endsection
@section('nav_title')
{{$nav_title}}
@endsection
@section('content')
   
    <div class="card-deck mb-4 text-center">
        @include('back-end.home-sections.statistics')
    </div>

    @include('back-end.home-sections.latest-comments')
@endsection