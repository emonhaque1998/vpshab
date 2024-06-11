<?php

namespace App\Jobs;

use App\Mail\AdminContact;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendContactFromAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $email;
    public $conversation;
    public $subject;
    public $urlLink;
    public function __construct($email, $conversation)
    {
        $this->email = $email;
        $this->conversation = $conversation->message;
        $this->subject = $conversation->contact->subject;
        $this->urlLink = route('view-ticket.show', ['view_ticket' => $conversation->contact->slug]);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)
        ->send(new AdminContact($this->conversation, $this->subject, $this->urlLink));
    }
}
