<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;
    public $subject,$name,$email_message,$urls;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$name,$email_message,$urls)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->email_message = $email_message;
        $this->urls = $urls;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Intrustpit | '.$this->subject)
        ->view('emails.mail');
    }
}
