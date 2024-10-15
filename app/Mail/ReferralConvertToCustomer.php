<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReferralConvertToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $pdfpath;

    public function __construct($user, $pdfpath = null)
    {
        $this->user = $user;
        $this->pdfpath = $pdfpath;
    }

    public function build()
    {

        return $this->subject('Welcome to Senior Life Care Account - Set your Password.')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('emails.referral_converted_to_customer')
            ->attach($this->pdfpath, [
                'as' => 'approval_letter.pdf',
                'mime' => 'application/pdf',
            ]);

    }
}
