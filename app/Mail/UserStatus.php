<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $details, $username, $pdfPath;

    public function __construct($details, $username, $pdfPath = null)
    {
        $this->details = $details;
        $this->username = $username;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->subject(config('app.professional_name').' | Account Verified')
            ->view('emails.userstatus');
            // ->attach($this->pdfPath, [
            //     'as' => 'approval_letter.pdf',
            //     'mime' => 'application/pdf',
            // ]);
    }
}
