@if(count($comments))
<h2 class="text-center">Latest comments</h2>
    <div class="card">
        <div id="table">
            <table class="table table-bordered table-responsive-md table-striped text-center">
            <thead>
                <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Username</th>
                <th class="text-center">Video name</th>
                <th class="text-center">Comment</th>
                <th class="text-center">Date</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td class="pt-3-half">{{$comment->id}}</td>
                    <td class="pt-3-half"><a href="{{route('users.edit',['id' => $comment->user->id])}}">{{$comment->user->name}}</a></td>
                    <td class="pt-3-half">  <a href="{{route('videos.edit',['id' => $comment->video->id])}}">{{$comment->video->name}}</a></td>
                    <td class="pt-3-half">{{$comment->comment}}</td>
                    <td class="pt-3-half">{{$comment->created_at->diffForHumans()}}</td>
                    
                </tr>
                @endforeach
            </tbody>
            </table>
            
        </div>
        </div>
    </div>
@endif