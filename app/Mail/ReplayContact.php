<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplayContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $message, $response;
    public function __construct($message, $response)
    {
        $this->message = $message;
        $this->response = $response;
    }

    public function build()
    {
        $user_message = $this->message;
        $response = $this->response;
        return $this->to($user_message->email)->view('back-end.mails.replay-messages',compact('user_message','response'));
    }
}
