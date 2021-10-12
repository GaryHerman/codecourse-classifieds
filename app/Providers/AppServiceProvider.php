<?php

namespace App\Providers;

use App\Models\Area;
use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Area::creating(function ($area) {
            $area->slug = $this->slugifyNested($area);
        });

        Category::creating(function ($category) {
            $category->slug = $this->slugifyNested($category);
        });
    }

    private function slugifyNested($nestedVar)
    {
        // Create a area slug on model creating event.  Slug can be parsed back in to determine structure because,
        // '.' means one tree level difference, '-' means replacement for spaces
        $tree = $nestedVar->ancestors->reverse()->push($nestedVar);

        $slug = $tree->map(function ($e) {
            return Str::of($e->name)->slug('-');
        })->join('.');

        return $slug;
    }
}
