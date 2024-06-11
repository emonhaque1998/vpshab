<?php

namespace App\Console\Commands;

use App\Jobs\SendInvoiceReminderEmail;
use Carbon\Carbon;
use App\Models\Invoice;
use Illuminate\Console\Command;

class BeforeSevenDaysExpiryAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:before-seven-days-expiry-alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Before 7 days order expiry send Invoice in user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $invoices = Invoice::all();

        foreach ($invoices as $key => $invoice) {
            $due = Carbon::parse($invoice->dueDate);
            $create = Carbon::parse($invoice->created_at);

            if($due->diffInDays($create) === 7 && $invoice->status === "Paid" && $invoice->createInvoiceReniew === 0){
                $newInvoice = Invoice::create([
                    "orderId" => uniqid(),
                    "user_id" => $invoice->user_id,
                    "quantity" => $invoice->quantity,
                    "totalAmount" => $invoice->totalAmount - $invoice->product->freshIP_amount,
                    "freshIp" => false,
                    "product_id" => $invoice->product_id,
                    "note" => $invoice->note
                ]);

                if($newInvoice){
                    Invoice::find($invoice->id)->update([
                        "createInvoiceReniew" => true
                    ]);
                }

                SendInvoiceReminderEmail::dispatch($newInvoice);
            }
        }
    }
}
