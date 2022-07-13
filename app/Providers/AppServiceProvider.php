<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Paginator::useBootstrap();
       /**
        * affichage des catégories dans l'onglet sur l'accueil
        * class View != de view d'affichage
        * cette façon rend la var $navbar-categories visible et accessible partout sur le site
        */
        $categories=Category::withCount('posts')->orderBy('posts_count','DESC')->get();
        //dd($categories);
        View::share('navbar_categories',$categories);
    }

}
