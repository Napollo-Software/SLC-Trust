<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Register extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $pdfpath;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$pdfpath)
    {
        $this->details = $details;
        $this->pdfpath = $pdfpath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('SLC | Set Password')
                    ->view('emails.registered')
            ->attach($this->pdfpath, [
                'as' => 'approval_letter.pdf',
                'mime' => 'application/pdf',
            ]);

    }
}
