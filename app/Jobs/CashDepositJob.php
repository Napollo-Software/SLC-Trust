<?php

namespace App\Jobs;

use App\Mail\CashDepositMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CashDepositJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    public $pdfLink;

    public function __construct($email, $pdfLink)
    {
        $this->email = $email;
        $this->pdfLink = $pdfLink;
    }

    public function handle()
    {
        Mail::to($this->email)->send(new CashDepositMail($this->pdfLink));
    }
}
