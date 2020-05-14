<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackEnd\Comments\Store as CommentsStore;
use App\Http\Requests\FrontEnd\Comments\Store;
use App\Http\Requests\FrontEnd\Messages\Store as MessagesStore;
use App\Http\Requests\FrontEnd\Users\Store as UsersStore;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
use App\models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
  
   public function __construct()
   {
       $this->middleware('auth')->only([
           'updateComment',
           'storeComment',
           'storeMessages'
       ]);
   }
   
    public function index()
    {
        $videos = Video::published()->orderBy('created_at', 'desc');
        if(request()->has('search') && request()->get('search')!=''){
            $videos->where('name','like',"%".request()->get('search')."%");
        }
        if(request()->has('user') && request()->get('user')!=''){
            $videos->where('user_id',request()->get('user'));
        }
        $videos = $videos->paginate(9);
        return view('home',compact('videos'));
    }
    public function video($id)
    {
        $video = Video::published()->with('tags', 'skills', 'category')->findOrFail($id);
        $youtubeId = $this->getYouTubeIdFromURL($video->youtube);
        return view ('front-end.videos.show',compact('video','youtubeId'));
    }
    public function categories($id)
    {
        $videos = Video::published()->where('cat_id', '=', $id)->orderBy('created_at', 'desc')->paginate(10);
        $category = Category::findOrFail($id);
        return view ('front-end.categories.index',compact('videos', 'category'));
    }
    public function skills($id)
    {
        $videos = Video::published()->whereHas('skills', function($query) use ($id){
            $query->where('skill_id', '=', $id);
        })->orderBy('created_at', 'desc')->paginate(10);
        $skill = Skill::findOrFail($id);
        return view ('front-end.skills.index',compact('videos', 'skill'));
    }

    public function getYouTubeIdFromURL($url)
    {
        $url_string = parse_url($url, PHP_URL_QUERY);
        parse_str($url_string, $args);
        return isset($args['v']) ? $args['v'] : false;
    }

    public function updateComment($id, Store $reqeust){
        $comment = Comment::findOrFail($id);
        if($comment->user->id == auth()->user()->id || auth()->user()->group == 'admin'){
            $comment->update(['comment' => $reqeust->comment]);
        }
        return redirect()->route('front.video',['id' => $comment->video_id,'#comments']);
    }
    public function storeComment(CommentsStore $reqeust){
        $reqeustArray = $reqeust->all();
        $reqeustArray = ['user_id' => auth()->user()->id] + $reqeustArray;
        $comment = Comment::create($reqeustArray);
        return redirect()->route('front.video',['id' => $comment->video_id,'#comments']);
    }
    public function contactus(){
        return view('front-end.shared.contact_us');
    }

    public function storeMessages(MessagesStore $request){
        Message::create($request->all());
        return redirect()->route('home')->with('message','Your message sent!');
    }
    public function page($id,  $slug = null){
        $page  = Page::findOrFail($id);
        return view('front-end.pages.index',compact('page'));
    }

    public function profile($id){
        $user = User::with('videos','comments')->findOrFail($id);
        return view('front-end.profile.index',compact('user'));
    }
    public function editProfile($id){
        $user = User::findOrFail($id);
        return view('front-end.profile.edit',compact('user'));
    }
    public function updateProfile($id, UsersStore $request){
        $user = User::findOrFail($id);
        $array = [];
        if($request->email != $user->email){
            $email = User::where('email',$request->email)->find();
            if($email == null){
                $array ['email'] = $request->email;
            }
        }
        if($request->name != $user->name){
            $array ['name'] = $request->name;
        }
        if($request->password != ''){
            $array ['password'] = Hash::make($request->password);
        }
        if(!empty($array)){
            $user->update($array);
        }
        return redirect()->route('front.profile',['id' => $user->id])->with('message','Your profile updated');
    }
}
