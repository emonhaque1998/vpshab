<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Admin;
use App\Models\Announcement;
use App\Models\Category;
use App\Models\Country;
use App\Models\IspLocation;
use App\Models\Product;
use App\Models\Support;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class DemoData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command using for just developer and create demo data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        Admin::factory()->create();
        User::factory()->create();
        Announcement::factory()->create();
        Support::factory()->create();
        Country::factory()->create();
        IspLocation::factory()->create();

        Category::factory()->create();
        Product::factory()->create();

        $this->info('Demo created successfully!');
    }
}
