<div>
    <form action="{{session('comment') == null ? route('comment.store') : route('comment.update',['id' => request()->comment]) }}" method = "POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Comment: </label>
        <input type="text" class="form-control" value="{{session('comment') != null ? session('comment')->comment : ''}}" name="comment">
        <input type="hidden" name="video_id" value="{{$row->id}}">
    </div>
    <button type="submit" class="btn btn-primary">{{session('comment') != null ? 'Edit' : 'Comment'}}</button>
    </form>
</div>
