<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function edit(User $user, Listing $listing)
    {
        return $this->touch($user, $listing);
    }

    public function update(User $user, Listing $listing)
    {
        return $this->touch($user, $listing);
    }

    public function destroy(User $user, Listing $listing)
    {
        return $this->touch($user, $listing);
    }

    // This is a general use method (should no explicit permission be defined)
    public function touch(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }
}
