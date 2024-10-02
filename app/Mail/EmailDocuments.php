<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailDocuments extends Mailable
{
    use Queueable, SerializesModels;

    public $name,$email_message,$filtered_links,$filtered_names,$referralId;

    public function __construct( $name,$email_message,$filtered_links,$filtered_names,$referralId)
    {
        $this->name = $name;
        $this->email_message = $email_message;
        $this->filtered_links = $filtered_links;
        $this->filtered_names = $filtered_names;
        $this->referralId = $referralId;
    }

    public function build()
    {
        return $this->subject(config('app.professional_name').' | Documents')->view('emails.email_documents');
    }
}
