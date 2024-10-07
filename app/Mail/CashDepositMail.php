<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CashDepositMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfLink;

    public function __construct($pdfLink)
    {
        $this->pdfLink = $pdfLink;
    }

    public function build()
    {
        return $this->subject("Verification Of Deposits")->view('emails.cash-deposit')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->attach($this->pdfLink, [
                'as' => 'deposit-verification.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
