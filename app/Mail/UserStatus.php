<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $pdfPath;

    public function __construct($user, $pdfPath = null)
    {
        $this->user = $user;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->subject('Welcome to '.config('app.professional_name').' – Your Account Has Been Approved!')
            ->bcc(env('MAIL_BCC_ADDRESS'))
            ->view('emails.userstatus');
        // ->attach($this->pdfPath, [
        //     'as' => 'approval_letter.pdf',
        //     'mime' => 'application/pdf',
        // ]);
    }
}
