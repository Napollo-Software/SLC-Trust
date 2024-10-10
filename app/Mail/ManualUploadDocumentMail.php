<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ManualUploadDocumentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $urls;

    public function __construct($user, $urls)
    {
        $this->user = $user;
        $this->urls = $urls;
    }

    public function build()
    {
        return $this->subject("Action Required: Complete and Submit Your Document")
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('emails.manual-upload-document-mail');
    }
}
