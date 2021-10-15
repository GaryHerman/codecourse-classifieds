<?php

namespace App\Mail;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ListingContactCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $listing;
    public $sender;
    public $body;

    public function __construct(Listing $listing, User $sender, $body)
    {
        $this->listing = $listing;
        $this->sender  = $sender;
        $this->body    = $body;
    }

    public function build()
    {
        return $this->view('email.listing.contact.message')
            ->subject("{$this->sender->name} sent a message about {$this->listing->title}")
            ->from("info@sasquatch.com")
            ->replyTo($this->sender->email);
    }
}
