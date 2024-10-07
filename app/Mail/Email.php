<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $name, $email_message, $urls;

    public function __construct($subject, $name, $email_message, $urls)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->email_message = $email_message;
        $this->urls = $urls;
    }

    public function build()
    {
        return $this->subject($this->subject)
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('emails.mail');
    }
}
