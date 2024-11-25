<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BillRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $url, $body_message;

    public function __construct($user, $url, $body_message)
    {
        $this->user = $user;
        $this->url = $url;
        $this->body_message = $body_message;
    }

    public function build()
    {
        return $this->subject('Bill Refused')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('emails.billarefused');
    }
}
