<?php

namespace App\Mail;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ListingShared extends Mailable
{
    use Queueable, SerializesModels;

    public $listing;
    public $sender;
    public $body;

    public function __construct(Listing $listing, User $sender, $body = null)
    {
        $this->listing = $listing;
        $this->sender  = $sender;
        $this->body    = $body;
    }

    public function build()
    {
        return $this
            ->view('email.listing.shared.message')
            ->subject("{$this->sender->name} shared a listing with you.")
            ->from('hello@sasquatch-classifieds.com');
    }
}
