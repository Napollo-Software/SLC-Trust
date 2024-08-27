<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
class WelcomeEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $subject,$name,$email_message,$url;
    protected $send_mail;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($send_mail,$subject,$name,$email_message,$url)
    {
        $this->send_mail = $send_mail;
        $this->subject = $subject;
        $this->name = $name;
        $this->email_message = $email_message;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new WelcomeEmail($this->subject,$this->name,$this->email_message,$this->url);        
        Mail::to($this->send_mail)->send($email);
    }
}
