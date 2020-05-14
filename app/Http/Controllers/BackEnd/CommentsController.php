<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\BackEnd\Controller;
use App\Models\Comment;

class CommentsController extends BackEndController
{
    protected $model;
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }
}
