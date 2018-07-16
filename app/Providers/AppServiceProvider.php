<?php

namespace App\Providers;

use Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        Blade::if('gauth', function () {
            return Auth::guard('student')->check() ||
                   Auth::guard('guardian')->check() ||
                   Auth::guard('faculty')->check() ||
                   Auth::guard('admin')->check() ||
                   Auth::guard('web')->check();
        });

        Blade::if('gguest', function () {
            return Auth::guard('web')->guest() &&
                   Auth::guard('admin')->guest() && Auth::guard('faculty')->guest() &&
                   Auth::guard('student')->guest() && Auth::guard('guardian')->guest();
        });
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
