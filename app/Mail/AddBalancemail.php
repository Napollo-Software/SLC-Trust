<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddBalancemail extends Mailable
{
    use Queueable, SerializesModels;

    public $details, $balace;

    public function __construct($details,$balace)
    {
        $this->details = $details;
        $this->balace = $balace;
    }

    public function build()
    {
        return $this->subject('Balance Added Successfully')
        ->bcc(env('MAIL_BCC_ADDRESS'))
        ->view('emails.addbalance');
    }
}
