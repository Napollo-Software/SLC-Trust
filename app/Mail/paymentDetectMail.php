<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class paymentDetectMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
     public $username;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$username)
    {
        $this->details = $details;
        $this->username = $username;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $app_name = config('app.professional_name');
          return $this->subject($app_name.' |Your recurring bill was charged successfully!')
                    ->view('emails.paymentdetect');
    }
}
