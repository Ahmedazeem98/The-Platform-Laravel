<div class="row">
    <div class="col-md-12 text-left">
        <p class="card-text">{{$comment->comment}}</p>
        
    @if(auth()->user() && (auth()->user()->id == $comment->user->id || auth()->user()->group == 'admin'))
            <a href="" onclick="$(this).next('div').slideToggle(1000);return false;">Edit</a>
            <div style="display: none">
                <form action="{{route('front.commentUpdate',['id' => $comment->id])}}" method="POST">
                   {{ csrf_field() }}
                   <input type="hidden" name="method" value="PUT">
                   <div class="form-group">
                       <textarea name="comment" class="form-control" cols="50" rows="5">{{$comment->comment}}</textarea>
                   </div>
                   <div class="form-group">
                    <button class="btn btn-dark" type="submit" cols="50" rows="5">Edit</button>
                </div>
                </form>
            </div>
        @endif
    </div>
</div>