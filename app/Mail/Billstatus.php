<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Billstatus extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->view('view.name')
            ->bcc(env('MAIL_BCC_ADDRESS'));
    }
}
