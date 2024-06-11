<?php

namespace App\Providers;

use App\View\Components\Admin\Breadcrumb;
use App\View\Components\Admin\Submit;
use App\View\Components\Frontend\CaseStudy;
use App\View\Components\Frontend\ContactUs;
use App\View\Components\Frontend\Help;
use App\View\Components\Frontend\MapState;
use App\View\Components\Frontend\Product;
use App\View\Components\Frontend\RdpToVps;
use App\View\Components\Frontend\Specification;
use App\View\Components\Users\According;
use App\View\Components\Users\Logout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('logout-form', Logout::class);
        Blade::component('according', According::class);
        Blade::component('submit', Submit::class);
        Blade::component('breadcrumb', Breadcrumb::class);
        Blade::component('rdptovps', RdpToVps::class);
        Blade::component('map', MapState::class);
        Blade::component('help', Help::class);
        Blade::component('contact', ContactUs::class);
        Blade::component('specification', Specification::class);
        Blade::component('case-study', CaseStudy::class);
        Blade::component('product-view', Product::class);
    }
}
