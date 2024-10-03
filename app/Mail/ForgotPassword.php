<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $details;

    public function __construct($details,$name)
    {
        $this->details = $details;
        $this->name = $name;
    }

    public function build()
    {
        $app_name = config('app.professional_name');
        return $this->subject($app_name.' | Reset your password ')
        ->view('forgotPassword.forgotPassword');
    }
}
