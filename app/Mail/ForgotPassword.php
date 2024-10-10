<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $details, $user;

    public function __construct($details, $user)
    {
        $this->details = $details;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Senior Life Care - Reset your SLC Account Password')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('forgotPassword.forgotPassword');
    }
}
