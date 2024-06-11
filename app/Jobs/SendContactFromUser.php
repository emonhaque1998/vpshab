<?php

namespace App\Jobs;

use App\Mail\UserContact;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendContactFromUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $contact;
    public $support;
    public function __construct($contact)
    {
        $this->contact = $contact;
        $this->support = $contact->support;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->support->email)
        ->send(new UserContact($this->contact));
    }
}
