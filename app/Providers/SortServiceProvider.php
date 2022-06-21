<?php

namespace App\Providers;

use App\Services\Sort;
use Illuminate\Support\ServiceProvider;

class SortServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Sort', function ($app) {
            return new Sort();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
