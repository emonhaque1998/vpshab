<?php

namespace App\Jobs;

use App\Mail\SendPdfEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendInvoicePdfEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $information;
    public function __construct($information)
    {
        $this->information = $information;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->information['email'])
        ->send(new SendPdfEmail($this->information));
    }
}
