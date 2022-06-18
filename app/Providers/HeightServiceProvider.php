<?php

namespace App\Providers;

use App\Services\Height;
use Illuminate\Support\ServiceProvider;

class HeightServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Height', function ($app) {
            return new Height();
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
