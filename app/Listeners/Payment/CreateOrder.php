<?php

namespace App\Listeners\Payment;

use App\Models\Order;
use App\Jobs\SendInvoicePdfEmailJob;
use Illuminate\Support\Facades\Cache;
use App\Events\Payment\ProductPayment;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateOrder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductPayment $event): void
    {
        $information = $event->information;
        $dueData = now()->addDays(30);

        $order_id = array();

        $invoice = Invoice::create([
            "orderId" => uniqid(),
            "user_id" => $information['user_id'],
            "quantity" => $information['quantity'],
            "totalAmount" => $information['totalAmount'],
            "freshIp" => intval($information['freshIp']) <= 0 ? false : true,
            "product_id" => $information['product_id'],
            "note" => $information['notes']
        ]);

        $information['invoiceId'] = $invoice->id;
        if($invoice){
            for($i = 1; $i <= $information['quantity']; $i++){
                $placeOrder = Order::create([
                    "name" => $information['customer_name'],
                    "email" => $information['email'],
                    "phone" => $information['phone'],
                    "amount" => $information['totalPrice'],
                    "address" => $information['address'],
                    "currency" => $information['currency'],
                    "product_id" => $information['product_id'],
                    "user_id" => $information['user_id'],
                    "invoice_id" => $invoice->id,
                    "orderID" => $invoice->orderId
                ]);

                $order_id[] = $placeOrder->id;
            }
        }

        $information['order_id'] = $order_id;
        $information['invoiceData'] = Invoice::find($invoice->id);

        Cache::forget("wp_order_count");
        Cache::forget("wp_order_for_service");

        session()->flash('paymentData', $information);
    }
}
