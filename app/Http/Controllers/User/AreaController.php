<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function store(Area $area)
    {
        session()->put('area', $area->slug);

        return redirect()->back();
    }
}
