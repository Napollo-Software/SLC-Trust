<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDocuments;
class DocumentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $name, $email_message, $filtered_links, $filtered_names,$referralId;
    protected $send_email;

    public function __construct($send_email, $name, $email_message, $filtered_links, $filtered_names,$referralId)
    {
        $this->send_email = $send_email;
        $this->name = $name;
        $this->email_message = $email_message;
        $this->filtered_links = $filtered_links;
        $this->filtered_names = $filtered_names;
        $this->referralId = $referralId;
    }

    public function handle()
    {
        $email = new EmailDocuments($this->name, $this->email_message, $this->filtered_links, $this->filtered_names,$this->referralId);
        Mail::to($this->send_email)->send($email);
    }
}
