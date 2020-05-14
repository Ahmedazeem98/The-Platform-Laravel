<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\Backend\Tags\Store;
use App\Models\Tag;


class TagsControllerll extends BackEndController
{
    protected $model;
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request){
        
        $this->model::create($request->all());
        return redirect()->route('tags.index');
    }

    public function update(Store $request, $id){

        $skill = $this->model::findOrFail($id);
        $skill->update($request->all());
        return redirect()->route('tags.index');
    }
}
