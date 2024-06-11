<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Console\Command;

class DeleteExpireOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expire-order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Expire Data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = Order::where('dueDate', '<', Carbon::now()->addDays(7))
                       ->get();

        foreach ($orders as $order) {
            // Update the status column as per your requirement
            $order->delete();
        }

        $this->info('Order Deleted successfully.');
    }
}
