<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $name, $email_message, $url;

    public function __construct($subject, $name, $email_message, $url)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->email_message = $email_message;
        $this->url = $url;
    }

    public function build()
    {
        return $this->subject('Welcome Email')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('emails.welcome-email');
    }
}
