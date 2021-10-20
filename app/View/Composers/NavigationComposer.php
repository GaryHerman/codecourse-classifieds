<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view)
    {
        if (! Auth::check()) {
            return $view;
        }

        $user = Auth::user();
        // using listings as a collection (without ()) to avoid hitting the db for count query
        $listings = $user->listings;

        return $view->with([
            'unpublishedListingsCount' => $listings->where('live', false)->count(),
            'publishedListingsCount'   => $listings->where('live', true)->count(),
        ]);
    }
}
