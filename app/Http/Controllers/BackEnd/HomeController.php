<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Comment;
use App\models\User;

class HomeController extends BackEndController
{
    protected $model;
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function index()
    {
        $page_title = 'Admin-Home';
        $nav_title = 'Home';
        $comments = Comment::orderBy('id','desc')->paginate(10);
        return view ('back-end.home',compact('page_title','nav_title','comments'));
    }
    
}
