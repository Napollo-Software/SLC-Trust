<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ManualUploadDocumentMail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendManualApploadDocumentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user, $urls;

    public function __construct($user, $urls)
    {
        $this->user = $user;
        $this->urls = $urls;

    }

    public function handle()
    {
        $email = new ManualUploadDocumentMail( $this->user, $this->urls);
        Mail::to($this->user->email)->send($email);
    }
}
