<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject,$name,$email_message,$url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$name,$email_message,$url)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->email_message = $email_message;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $app_name = config('app.name');
        return $this->subject($app_name.' | Welcome Email')
        ->view('emails.welcome-email');
    }
}
