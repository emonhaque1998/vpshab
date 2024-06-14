<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Console\Command;

class BeforeFiveDaysCreateInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:before-five-days-create-invoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Order Auto Genarete Invoice';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = Order::where('dueDate', '<=', Carbon::now()->addDays(5))
                        ->where("status", "Successfull")
                       ->get();

        foreach ($orders as $order) {
            if($order->renew && !$order->invoice->createInvoiceReniew){
                if($order->next_discount){
                    $invoice = Invoice::create([
                        "orderId" => uniqid(),
                        "user_id" => $order->user->id,
                        "quantity" => 1,
                        "product_id" => $order->product->id,
                        "totalAmount" => $order->product->monthly_price - $order->discount_amount,
                        "note" => $order->invoice->note,
                        "createInvoiceReniew" => true
                    ]);
                    $order->invoice_id = $invoice->id;
                    $order->save();
                }else{
                    $invoice = Invoice::create([
                        "orderId" => uniqid(),
                        "user_id" => $order->user->id,
                        "quantity" => 1,
                        "product_id" => $order->product->id,
                        "totalAmount" => $order->product->monthly_price,
                        "note" => $order->invoice->note,
                        "createInvoiceReniew" => true
                    ]);
                    $order->invoice_id = $invoice->id;
                    $order->save();
                }
            }
        }

        $this->info('Order statuses updated successfully.');
    }
}
