<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $id;

    public function __construct($name, $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function build()
    {
        return $this->subject('New User!')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('emails.registeralert');
    }
}
