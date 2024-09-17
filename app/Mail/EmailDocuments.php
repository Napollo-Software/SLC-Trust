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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $name,$email_message,$filtered_links,$filtered_names,$referralId)
    {

        $this->name = $name;
        $this->email_message = $email_message;
        $this->filtered_links = $filtered_links;
        $this->filtered_names = $filtered_names;
        $this->referralId = $referralId;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $app_name = config('app.name');
        return $this->subject($app_name.' | Documents')->view('emails.email_documents');
    }
}
