<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class registermail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        $app_name = config('app.professional_name');
        
        return $this->subject('Welcome to ' . $app_name . '!')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('emails.registermail');
    }
}
