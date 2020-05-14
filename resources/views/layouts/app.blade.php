
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    

    <title>The Platform</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/album/">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

  
    
  </head>

  <body>

    @include('layouts.nav')
      
      <div style="min-height: 450px;" class="container">
      @if(session('message')!=null)
        <div class="alert alert-success">
          {{session('message')}}
        </div>
      @endif
        @if(count($errors))
          @include('front-end.shared.errors')
        @endif
        @yield('content')

      </div>
    @include('layouts.footer')