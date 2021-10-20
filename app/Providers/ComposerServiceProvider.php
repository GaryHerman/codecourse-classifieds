<?php

namespace App\Providers;

use App\Models\Area;
use App\Models\Category;
use App\View\Composers\AreaComposer;
use App\View\Composers\NavigationComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(AreaComposer::class);
    }

    public function boot()
    {
        // Using class based composers...
        // View::composer('profile', ProfileComposer::class);
        //
        // Using closure based composers...
        // View::composer('dashboard', function ($view) {});

        View::composer('*', AreaComposer::class);
        View::composer('layouts.partials._nav', NavigationComposer::class);

        View::composer(['listings.partials.forms._categories'], function ($view) {
            $categories = Category::get()->toTree();

            $view->with(compact('categories'));
        });

        View::composer(['listings.partials.forms._areas'], function ($view) {
            $areas = Area::get()->toTree();

            $view->with(compact('areas'));
        });
    }
}
