<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingContactFormRequest;
use App\Mail\ListingContactCreated;
use App\Models\Area;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ListingContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(StoreListingContactFormRequest $request, Area $area, Listing $listing)
    {
        Mail::to($listing->user)->queue(
            new ListingContactCreated($listing, $request->user(), $request->message)
        );

        return back()->withSuccess('Your email has been sent successfully.');
    }
}
