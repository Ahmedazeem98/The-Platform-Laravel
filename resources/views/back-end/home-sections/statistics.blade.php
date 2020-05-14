<div class="card mb-4 shadow-sm">
    <div class="card-header">
      <h4 class="my-0 font-weight-normal">Videos</h4>
    </div>
    <div class="card-body">
      <h1 class="card-title pricing-card-title">{{\App\Models\Video::count()}}</h1>
      <a href="{{route('videos.index')}}" class="btn btn-lg btn-block btn-outline-primary">All videos</a>
    </div>
  </div>
  <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Skills</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">{{\App\Models\Skill::count()}}</small></h1>
        <a href="{{route('skills.index')}}" class="btn btn-lg btn-block btn-outline-primary">All skills</a>
      </div>
    </div>
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
      <h4 class="my-0 font-weight-normal">Tags</h4>
    </div>
    <div class="card-body">
      <h1 class="card-title pricing-card-title">{{\App\Models\Tag::count()}}</h1>
      <a href="{{route('tags.index')}}" class="btn btn-lg btn-block btn-outline-primary">All tags</a>
    </div>
  </div>
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
      <h4 class="my-0 font-weight-normal">Messages</h4>
    </div>
    <div class="card-body">
      <h1 class="card-title pricing-card-title">{{\App\Models\Message::count()}}</h1>
      <a href="{{route('messages.index')}}" class="btn btn-lg btn-block btn-outline-primary">All messages</a>
    </div>
  </div>
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
      <h4 class="my-0 font-weight-normal">Comments</h4>
    </div>
    <div class="card-body">
      <h1 class="card-title pricing-card-title">{{\App\Models\Comment::count()}}</h1>
      <a href="{{route('videos.index')}}" class="btn btn-lg btn-block btn-outline-primary">On videos</a>
    </div>
  </div>