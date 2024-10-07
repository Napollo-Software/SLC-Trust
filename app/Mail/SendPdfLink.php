<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPdfLink extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfUrl;

    public function __construct($pdfUrl)
    {
        $this->pdfUrl = $pdfUrl;
    }

    public function build()
    {
        return $this->view('emails.send_pdf_link')->bcc(env('MAIL_BCC_ADDRESS'));
    }

}
