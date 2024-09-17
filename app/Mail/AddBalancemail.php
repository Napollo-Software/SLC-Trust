<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddBalancemail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $balace;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$balace)
    {
        $this->details = $details;
        $this->balace = $balace;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $app_name = config('app.name');
        return $this->subject($app_name.' | Balance Added Successfully')
        ->view('emails.addbalance');
    }
}
