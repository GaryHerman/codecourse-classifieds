<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListingPublishedController extends Controller
{
    public $limit = 10;

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $listings = $request->user()->listings()->with(['area'])->IsLive()->latestFirst()->paginate($this->limit);

        return view('user.listings.published.index', compact('listings'));
    }
}
