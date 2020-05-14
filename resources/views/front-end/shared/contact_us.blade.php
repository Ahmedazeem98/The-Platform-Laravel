@extends('layouts.app')

@section('content')
<h3 class="display-4"> Contact Us </h3>
<form action = "{{route('contact.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="row">

        <div class="col-md-4 form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name">
            
        </div> 
        <div class="col-md-4 form-group">
            <label>Email</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 form-group">
            <label>Message</label>
            <textarea class="form-control" name="message" cols="30" rows="5" placeholder="leavel your message">{{ old('message') }}</textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-dark">Send</button>
</form>
@endsection