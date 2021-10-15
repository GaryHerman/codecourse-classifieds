<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingFormRequest;
use App\Jobs\UserViewedListing;
use App\Models\Area;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public $limit = 10;

    public function index(Area $area, Category $category)
    {
        $listings = Listing::with(['user', 'area'])->isLive()->inArea($area)->fromCategory($category)->latestFirst()->paginate($this->limit);

        return view('listings.index', compact('listings', 'category'));
    }

    public function show(Request $request, Area $area, Listing $listing)
    {
        if (! $listing->live()) {
            abort(404);
        }

        if ($request->user()) {
            dispatch(new UserViewedListing($request->user(), $listing));
        }

        return view('listings.show', compact('listing'));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(StoreListingFormRequest $request)
    {
        $listing = new Listing;

        $listing->title = $request->title;
        $listing->body = $request->body;
        $listing->category_id = $request->category_id;
        $listing->area_id = $request->area_id;
        $listing->user()->associate($request->user());

        $listing->save();


    }
}
