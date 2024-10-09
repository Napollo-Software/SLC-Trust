<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CashDepositMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfLink, $details;

    public function __construct($pdfLink, $details)
    {
        $this->pdfLink = $pdfLink;
        $this->details = $details;

    }

    public function build()
    {
        return $this->subject("Deposit Verification Receipt")->view('emails.cash-deposit')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->attach($this->pdfLink, [
                'as' => 'deposit-verification.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
