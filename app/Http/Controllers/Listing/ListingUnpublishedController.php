<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListingUnpublishedController extends Controller
{
    public $limit = 10;

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $listings = $request->user()->listings()->with(['area'])->IsNotLive()->latestFirst()->paginate($this->limit);

        return view('user.listings.unpublished.index', compact('listings'));
    }
}
