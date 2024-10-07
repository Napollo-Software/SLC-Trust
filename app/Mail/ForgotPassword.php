<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $details, $name;

    public function __construct($details, $name)
    {
        $this->details = $details;
        $this->name = $name;
    }

    public function build()
    {
        return $this->subject('Reset your password ')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('forgotPassword.forgotPassword');
    }
}
