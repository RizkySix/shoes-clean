<?php

namespace App\Jobs;

use App\Mail\MailDoneOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emails;
    protected $message;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $theMsg)
    {
        $this->emails = $email;
        $this->message = $theMsg;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->emails)->send(new MailDoneOrder($this->message));
    }
}
