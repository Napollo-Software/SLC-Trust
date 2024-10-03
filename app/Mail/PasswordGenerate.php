<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordGenerate extends Mailable
{
    public $details;
    use Queueable, SerializesModels;


   public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        $app_name = config('app.professional_name');
       return $this->subject($app_name.' | Password Generated!')
                    ->view('emails.passwordGenerate');
    }
}
