<?php

namespace App\Providers;

use App\Models\Area;
use App\Models\Category;
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
        // '-' means one tree level difference, '.' means replacement for spaces

        $ancestorNames = '';

        foreach ($nestedVar->ancestors as $ancestor) {
            $currentName = Str::of($ancestor->name)->slug('.');

            if ($ancestorNames == '') {
                $ancestorNames = $currentName;
            } else {
                $ancestorNames = $ancestorNames . '-' . $currentName;
            }
        }

        // If there are no ancestors, just use area->name, if there are ancestors then add area->name
        if ($ancestorNames == '') {
            $slug = Str::of($nestedVar->name)->slug('.');
        } else {
            $slug = $ancestorNames . '-' . Str::of($nestedVar->name)->slug('.');
        }

        $slug = Str::lower($slug);

        return $slug;
    }
}
