<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\SendInvoiceReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendInvoiceReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $invoice;
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->invoice->user->email)
        ->send(new SendInvoiceReminder($this->invoice));
    }
}
