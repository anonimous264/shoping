<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/* use Illuminate\Support\Facades\Schema; */

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       /*  Schema::defaultStringLength(191);//si es posible eliminar esto */
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
