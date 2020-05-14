<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends BackEndController
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    public function store(Store $request){
        
        $requestArray = $request->all();
        $requestArray['password'] = Hash::make($requestArray['password']);
        $this->model::create($requestArray);
        return redirect()->route('users.index');
    }

    public function update(Update $request, $id){

        $user = $this->model::findOrFail($id);
        $requestArray = $request->all();

        if(isset($requestArray['password']) && $request->password != ''){
            $requestArray['password'] = Hash::make($requestArray['password']);
        }
        else{
            unset($requestArray['password']);
        }

        $user->update($requestArray);
        return redirect()->route('users.index');
    }

}
