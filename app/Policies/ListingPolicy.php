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
        return $listing->ownedByUser($user);
    }

    public function update(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }

    public function destroy(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }
}
