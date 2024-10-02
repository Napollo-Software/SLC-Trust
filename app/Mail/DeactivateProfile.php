<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeactivateProfile extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
   
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function build()
    {
        return $this->subject(config('app.professional_name').' | Profile Deactivated!')
        ->view('emails.deactivateprofile');
    }
}
