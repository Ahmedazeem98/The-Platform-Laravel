<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests\BackEnd\Comments\Store;
use App\Models\Comment;

trait CommentTrait{
    public function commentStore(Store $request){
       $requestArray = $request->all();
       $requestArray = ['user_id' => auth()->user()->id] + $requestArray;
       Comment::create($requestArray);
       return redirect()->route('videos.edit',['id' => $requestArray['video_id']]);
    }
    public function commentDelete($id){
       $comment = Comment::findOrFail($id);
       $comment->delete();
        return redirect()->route('videos.edit',['id' => $comment->video_id]);
     }
     public function commentEdit($id){
       $comment = Comment::findOrFail($id);
        return redirect()->route('videos.edit',['id' => $comment->video_id,'comment' => $comment,'#comments'])->with('comment',$comment);
     }
     public function commentUpdate($id, Store $request){
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
         return redirect()->route('videos.edit',['id' => $comment->video_id]);
      }
}