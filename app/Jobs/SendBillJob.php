<?php

namespace App\Jobs;

use App\Mail\BillApproved;
use App\Mail\BillPartiallyApproved;
use App\Mail\BillSubmitted;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendBillJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user, $url, $email_message, $email_template;

    public function __construct($user, $url,$email_message,$email_template)
    {
        $this->user = $user;
        $this->url = $url;
        $this->email_message = $email_message;
        $this->email_template = $email_template;

    }

    public function handle()
    {
        if($this->email_template == 'bill_submitted')
        {
            $email = new BillSubmitted($this->user, $this->url, $this->email_message);
            Mail::to($this->user->email)->send($email);
        }
        elseif($this->email_template == 'bill_approved')
        {
            $email = new BillApproved($this->user, $this->url, $this->email_message);
            Mail::to($this->user->email)->send($email);

        }
        elseif($this->email_template == 'bill_partially_approved')
        {
            $email = new BillPartiallyApproved($this->user, $this->url, $this->email_message);
            Mail::to($this->user->email)->send($email);

        }
    }

}
