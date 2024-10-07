<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class addbillmail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {

        return $this->subject('Bill Added Successfully')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('emails.addbillmail');
    }
}
