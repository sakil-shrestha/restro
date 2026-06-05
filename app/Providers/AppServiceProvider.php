<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        // Tells Laravel to render Bootstrap 5 markup for pagination links
        Paginator::useBootstrapFive();

        // OR if you are using an older project with Bootstrap 4:
        // Paginator::useBootstrapFour();
    }
}
