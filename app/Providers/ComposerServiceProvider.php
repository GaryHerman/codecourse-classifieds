<?php

namespace App\Providers;

use App\View\Composers\AreaComposer;
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
    }
}
