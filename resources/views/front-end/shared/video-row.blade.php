<div class="row">
    <div class="col-md-4">
      @foreach($videos as $video)
          @include('front-end.shared.video-card')
      @endforeach
    </div>
</div>
<div class="row">
    <div class="col-md-12">
      {{$videos->links()}}
    </div>
</div>