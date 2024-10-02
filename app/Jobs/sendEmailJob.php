<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
class sendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $subject,$name,$email_message,$urls;
    protected $send_mail;

    public function __construct($send_mail,$subject,$name,$email_message,$urls)
    {
        $this->send_mail = $send_mail;
        $this->subject = $subject;
        $this->name = $name;
        $this->email_message = $email_message;
        $this->urls = $urls;
    }

    public function handle()
    {
        $email = new Email($this->subject,$this->name,$this->email_message,$this->urls);
        Mail::to($this->send_mail)->send($email);
    }
}
