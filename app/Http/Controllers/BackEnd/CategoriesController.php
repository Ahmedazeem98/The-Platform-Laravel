<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\Backend\categories\Store;
use App\Models\Category;

class CategoriesController extends BackEndController
{
    protected $model;
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }


    public function store(Store $request){
        
        $this->model::create($request->all());
        return redirect()->route('categories.index');
    }

    public function update(Store $request, $id){

        $category = $this->model::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }
}
