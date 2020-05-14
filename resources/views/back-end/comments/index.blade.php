
               <div style="height: 400px;overflow: scroll;" id="comments">
                <br><br>
                <h3 class="text-center">Comments</h3>
                    <ul style="" class="media-list">
                        @foreach($comments as $comment)
                        <li class="media">
                            <div class="media-body">
                              <h4 class="float-left" class="media-heading"><a href="#fakelink">{{$comment->user->name}}</a> <small style="font-size: 15px;">{{$comment->created_at->diffForHumans()}}</small></h4>
                              <a href="{{route('comment.destroy',['id' => $comment->id])}}" class="float-right btn btn-danger">Delete</a>
                            
                              <a href="{{route('comment.edit',['id' => $comment->id])}}" class="float-right btn btn-primary">Edit</a>
                              
                              <p style="clear:both">{{$comment->comment}}</p>
                              <a href="#">
                                <span class="glyphicon glyphicon-remove"></span>
                              </a>
                            </p>
                            </div>
                          </li>
                        @endforeach
                    </ul>
               </div><!-- End div .scroll-widget -->
              
              
         