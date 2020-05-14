<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\Backend\Skills\Store;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsControllerll extends BackEndController
{
    protected $model;
    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }


    public function store(Store $request){
        
        $this->model::create($request->all());
        return redirect()->route('skills.index');
    }

    public function update(Store $request, $id){

        $skill = $this->model::findOrFail($id);
        $skill->update($request->all());
        return redirect()->route('skills.index');
    }
}
