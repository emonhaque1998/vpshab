<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Console\Command;

class BeforeSevenDaysOrderChange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:before-seven-days-order-change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = Order::where('dueDate', '<=', Carbon::now()->addDays(7))
                       ->get();

        foreach ($orders as $order) {
            if(!$order->renew){
                $order->renew = true;
                $order->save();
            }
        }

        $this->info('Order renew updated successfully.');
    }
}
