<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    /** php artisan vendor:publish, pour changer le style de la pagination avec bootstrap
     * puis 16 pour choisir paginator
     * après on configure la fonction boot ci-dessous comme c'est fait
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
