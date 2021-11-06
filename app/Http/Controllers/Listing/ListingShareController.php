<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingShareFormRequest;
use App\Mail\ListingShared;
use App\Models\Area;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ListingShareController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Area $area, Listing $listing)
    {
        return view('listings.share.index', compact('listing'));
    }

    public function store(StoreListingShareFormRequest $request, Area $area, Listing $listing)
    {
        collect(array_filter($request->emails))->each(function($email) use ($listing, $request) {
            Mail::to($email)->queue(
                new ListingShared($listing, $request->user(), $request->message)
            );
        });

        return redirect()->route('listings.show', [$area, $listing])->withSuccess('Listing shared.');
    }
}
