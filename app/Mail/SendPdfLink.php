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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdfUrl)
    {
        $this->pdfUrl = $pdfUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.send_pdf_link');
    }

}
