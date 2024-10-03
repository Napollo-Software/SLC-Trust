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

    public function __construct($details, $pdfpath = null)
    {
        $this->details = $details;
        $this->pdfpath = $pdfpath;
    }

    public function build()
    {

        return $this->subject(config('app.professional_name') . ' | Set Password')
            ->view('emails.registered');
            // ->attach($this->pdfpath, [
            //     'as' => 'approval_letter.pdf',
            //     'mime' => 'application/pdf',
            // ]);

    }
}
