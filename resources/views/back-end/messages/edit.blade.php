@extends('back-end.layouts.app')

@section('page_title')
    {{$page_title}}
@endsection

@section('nav_title')
    Send Replay
@endsection

@section('content')

    <div class="row">
        <div class="col-md-4 form-group">
            <label>Name</label>
            <input readonly class="form-control" type="text" name="name" value="{{ $row->name }}">
            
        </div> 
        <div class="col-md-4 form-group">
            <label>Email</label>
            <input readonly class="form-control" type="email" name="email" value="{{ $row->email }}" placeholder="Enter your email">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 form-group">
            <label>Message</label>
            <textarea readonly class="form-control" name="message" cols="30" rows="5" placeholder="leavel your message">{{ $row->message }}</textarea>
        </div>
    </div>

<hr>
<h4>Replay</h4>
<form action = "{{route('messages.replay',['id' => $row])}}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8 form-group">
            <textarea class="form-control" name="response" cols="30" rows="5" placeholder="leavel your response"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-dark">Send</button>
    </form>
@endsection