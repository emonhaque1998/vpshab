<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;

class SuperCreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name} {email} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->option('password') ?? bcrypt('password');

        $user = Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        $this->info('User created successfully!');
    }
}
