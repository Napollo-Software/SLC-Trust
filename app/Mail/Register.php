<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Register extends Mailable
{
    use Queueable, SerializesModels;
    
    public $details, $pdfpath;

    public function __construct($details, $pdfpath = null)
    {
        $this->details = $details;
        $this->pdfpath = $pdfpath;
    }

    public function build()
    {

        return $this->subject('Welcome to Senior Life Care Account - Set your Password.')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('emails.registered');
        // ->attach($this->pdfpath, [
        //     'as' => 'approval_letter.pdf',
        //     'mime' => 'application/pdf',
        // ]);

    }
}
