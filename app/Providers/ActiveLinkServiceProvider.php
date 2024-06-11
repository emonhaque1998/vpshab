<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ActiveLinkServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::share("activeLink", function($group){
            foreach ($group as $route) {
                if(Route::currentRouteName() == $route){
                    return true;
                }
            }
        });
    }
}
