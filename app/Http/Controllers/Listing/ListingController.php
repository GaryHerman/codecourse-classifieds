<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
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
}
