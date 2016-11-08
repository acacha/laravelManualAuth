<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ManualAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            \App\ManualAuth\Guard::class, config('manualauth.guard')
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
