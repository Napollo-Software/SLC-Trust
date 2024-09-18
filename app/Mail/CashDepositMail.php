<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
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
        $app_name = config('app.name');
        return $this->subject("{$app_name} | Verification Of Deposits")->view('emails.cash-deposit')
            ->attach($this->pdfLink, [
                'as' => 'deposit-verification.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
