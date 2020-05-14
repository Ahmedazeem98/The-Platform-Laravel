<div class="text-left" id="comments">
    <br><br>
    <div style="display: none">
      @if(auth()->user())
      <br>
      <form action="{{route('front.commentStore')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
              <textarea name="comment" class="form-control" cols="50" rows="5"></textarea>
          </div>
          <input type="hidden" name="video_id" value="{{$comment->video_id}}">
          <div class="form-group">
              <button class="btn btn-dark" type="submit" cols="50" rows="5">Add</button>
          </div>
      </form>
      @endif
  </div>@if(auth()->user())
  <a class="btn btn-dark" href=""onclick="$(this).prev().slideToggle(1000),$(this).css({'display':'none'});return false;">Add comment</a>
  @endif
</div>