<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Controllers\Backend\CommentTrait;
use App\Http\Requests\BackEnd\Videos\Store;
use App\Http\Requests\BackEnd\Videos\Update;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use Carbon\Carbon;


class VideosController extends BackEndController
{
    use CommentTrait;
    protected $model;
    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    protected function with(){
        return ['category', 'user'];
    }

    protected function syncTagsSkills($row , $requestArraay){

         // to make sure that the user choose skills and add them to skills_videos table
         if(isset($requestArraay['skills']) && !empty($requestArraay['skills'])){
            $row->skills()->sync($requestArraay['skills']);
        }
        
        // to make sure that the user choose tags and add them to tags_videos table
        if(isset($requestArraay['tags']) && !empty($requestArraay['tags'])){
            $row->tags()->sync($requestArraay['tags']);
        }
        
    }
    protected function append(){
        $array = [
            
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'selected_skills' => [],
            'tags' => Tag::get(),
            'selected_skills' => [],
            'comments' => []

        ];
        // get all skills that appended to video with id 'video' (inner join) 
        if(request()->route()->parameter('video')){
            $array ['selected_skills'] = $this->model->find(request()->route()->parameter('video'))->skills()->pluck('skills.id')->toArray();
        }
        // get all tags that appended to video with id 'video' (inner join) 
        if(request()->route()->parameter('video')){
            $array ['selected_tags'] = $this->model->find(request()->route()->parameter('video'))->tags()->pluck('tags.id')->toArray();
        }
        

        // get all comments on one video 
        if(request()->route()->parameter('video')){
            $array ['comments'] = $this->model->find(request()->route()->parameter('video'))->comments()->with('user')->get();
        }
        return $array;
    }

    public function store(Store $request){

        $file = $request->file('image');
        $fileName = time().$file->getClientOriginalName();
        $file->move(public_path('storage/videosCovers/'),$fileName);
        $requestArraay = ['user_id' => auth()->user()->id, 'image' => $fileName] +  $request->all();

        $row  = $this->model::create($requestArraay);
        $this->syncTagsSkills($row, $requestArraay);

        return redirect()->route('videos.index');
    }

    public function update(Update $request, $id){

        $requestArraay = $request->all();
        if($request->has('image')){
            $file = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            $file->move(public_path('storage/videosCovers/'),$fileName);
            $requestArraay = ['image' => $fileName] + $requestArraay;
        } else {

            unset($requestArraay['image']);
        }

        $row = $this->model::findOrFail($id);
        $row->update($requestArraay);
        $this->syncTagsSkills($row, $requestArraay);

        return redirect()->route('videos.index');
    }

}
