<?php

namespace App\Listeners\Payment;

use App\Events\Payment\FundPayment;
use App\Models\Fund;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateFund
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
    public function handle(FundPayment $event): void
    {
        $information = $event->information;

        $funds = Fund::create([
            "amount" => $event->information['totalPrice'],
            "user_id" => $event->information['user_id']
        ]);

        $information['fundId'] = $funds->id;
        session()->flash('fundData', $information);
    }
}
