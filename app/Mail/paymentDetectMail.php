<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class paymentDetectMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details, $username;

    public function __construct($details, $username)
    {
        $this->details = $details;
        $this->username = $username;
    }

    public function build()
    {
        return $this->subject('Your recurring bill was charged successfully!')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('emails.paymentdetect');
    }
}
