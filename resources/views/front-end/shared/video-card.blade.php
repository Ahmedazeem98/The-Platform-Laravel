<div class="col-md-4">
  <a class="nav-link" href="{{route('front.video',['id' => $video->id])}}">
  <div class="card mb-4 shadow-sm">
    <img class="bd-placeholder-img card-img-top rounded" width="100%" height="225" src="{{url('storage/videosCovers/'.$video->image)}}">
      <div style="min-height: 90px;" class="card-body">
        <div>
          <h5 class="card-text">
            {{$video->name}}
            <small>{{$video->created_at->diffForHumans()}}</small>
          </h5>
        </div>
        
      </div>
  </div>
</a> 
</div>
