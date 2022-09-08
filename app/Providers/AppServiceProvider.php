<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
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
        //definition globale de la langue du site
        \App::setLocale('fr');

        //definition framework css de pagination ici bootstrap
        Paginator::useBootstrap();
       /**
        * affichage des catégories dans l'onglet sur l'accueil
        * class View != de view d'affichage
        * cette façon rend la var $navbar-categories visible et accessible partout sur le site
        */
        $categories=Category::withCount('posts')->orderBy('posts_count','DESC')->get();
        //dd($categories);
        View::share('navbar_categories',$categories);

        //variable globale
        $setting=Setting::find(1);
        View::share('setting',$setting);

        //total articles
        $total_posts=Post::all()->count();
        View::share('total_posts',$total_posts);

        //total categories
        $total_categories=Category::all()->count();
        View::share('total_categories',$total_categories);

        //total users
        $total_users=User::all()->count();
        View::share('total_users',$total_users);

        //total users
        $total_comments=Comment::all()->count();
        View::share('total_comments',$total_comments);

        $rb_posts=Post::latest()->approved()->take(2)->get();
        View::share('rb_posts',$rb_posts);
    }
}
