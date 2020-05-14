<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Messages\Store as MessagesStore;
use App\Http\Requests\FrontEnd\Messages\Store;
use App\Mail\ReplayContact;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class MessagesContorller extends BackEndController
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function replay($id, MessagesStore $request){
        $message = Message::findOrFail($id);
        Mail::send(new ReplayContact($message, $request->response));
        return redirect()->route('messages.edit',['id' => $id]);
    }
}
