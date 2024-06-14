<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Console\Command;

class ExpireRecordsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire:records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Status Change';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = Order::where('dueDate', '<', Carbon::now()->addDays(1))
                        ->where("status", "Successfull")
                       ->get();

        foreach ($orders as $order) {
            // Update the status column as per your requirement
            $order->invoice->delete();
            $order->status = 'Expire';
            $order->save();
        }

        $this->info('Order statuses updated successfully.');
    }
}
