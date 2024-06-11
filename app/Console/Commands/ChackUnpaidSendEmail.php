<?php

namespace App\Console\Commands;

use App\Jobs\SendInvoiceReminderEmail;
use App\Models\Invoice;
use Illuminate\Console\Command;

class ChackUnpaidSendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:chack-unpaid-send-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'When a invoice create but this is unpaid then this command use it.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $timeDelay = now();
        $invoices  = Invoice::where("status", "Unpaid")->get();
        foreach ($invoices as $key => $invoice) {
            SendInvoiceReminderEmail::dispatch($invoice)->delay($timeDelay);
            $timeDelay = $timeDelay->addMinutes(1);  
        }
        
        $this->info('Delayed emails dispatched successfully.');
    }
}
