<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    
    public $details, $name;

    public function __construct($details,$name)
    {
        $this->details = $details;
        $this->name = $name;
    }

    public function build()
    {
        return $this->subject(config('app.professional_name').' | Reset your password ')
        ->view('forgotPassword.forgotPassword');
    }
}
