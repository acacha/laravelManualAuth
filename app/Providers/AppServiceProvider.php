<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            //$this->app->bind(
    //    \App\ManualAuth\Guard::class, \App\ManualAuth\ParameterGuard::class
    //);
//
        $this->app->bind(
            \App\ManualAuth\Guard::class, \App\ManualAuth\CookieGuard::class
        );

        $this->app->bind(
            \App\ManualAuth\UserProvider::class, \App\ManualAuth\EloquentUserProvider::class
        );

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
