@extends('layouts.app')

@section('content')
 <!-- Three columns of text below the carousel -->
 <div style="min-height: 450px" class="container marketing">
 <div class="row">
    <div class="col-lg-4">
      
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
        <div class="row">
            <div class="col-lg-4">
      
            </div><!-- /.col-lg-4 -->
            <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://image.flaticon.com/icons/svg/21/21104.svg">
            <div class="row">
                <div class="col-lg-4">
        
                </div><!-- /.col-lg-4 -->
            </div>
        </div>
      <h2 class="text-center">{{$user->name}}</h2>
      <h5 class="text-center">{{$user->email}}</h5>
      <h5 class="text-center"> <a href="{{url('/home?user='.$user->id)}}"> Videos:</a> {{count($user->videos)}}</h5>
        @if(auth()->user() && auth()->user()->id == $user->id)
      <h5 class="text-center"><a class="btn btn-dark" href="{{route('front.editProfile',['id' => $user->id])}}">Edit</a></h5>
      @endif
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
  </div><!-- /.row -->
 </div>
  @endsection