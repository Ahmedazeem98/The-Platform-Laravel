<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\Backend\Pages\Store;
use App\Models\Page;

class PagesControllerll extends BackEndController
{
    protected $model;
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request){
        
        $this->model::create($request->all());
        return redirect()->route('pages.index');
    }

    public function update(Store $request, $id){

        $page = $this->model::findOrFail($id);
        $page->update($request->all());
        return redirect()->route('pages.index');
    }
}
