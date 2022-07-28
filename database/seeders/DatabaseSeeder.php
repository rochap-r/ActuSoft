<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Role;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * php artisan migrate:fresh --seed  recree la bd et les données avec faker
     * php artisan db:seed  cree les donnees avec faker
     *
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /**
         * truncate empeche le double enregistrement d'une meme donnée
         */
        //Schema::disableForeignKeyConstraints();   desactive la contrainte de la clé etrangere

        Schema::disableForeignKeyConstraints();
        \App\Models\User::truncate();
        \App\Models\Role::truncate();

        \App\Models\Category::truncate();
        \App\Models\Post::truncate();
        \App\Models\Comment::truncate();
        \App\Models\Tag::truncate();
        \App\Models\Image::truncate();
         Schema::enableForeignKeyConstraints();


        /**generation des fausses données */
        \App\Models\Role::factory(1)->create();
        \App\Models\Role::factory(1)->create(['name'=>"admin"]);

        //affiche toutes les url lors du lancement des migrations
        //dd(Route::getRoutes());

        $routes=Route::getRoutes();
        $permissions_id=[];

        // insertion de toutes les url d'admin dans la table permission
        foreach ($routes as $route){
            if (strpos($route->getName(),'admin')!==false)
            {
                $permission=Permission::create(['name'=>$route->getName()]);
                $permissions_id[]=$permission->id;
                //var_dump($route->getName());
            }

        }

        Role::where('name','admin')->first()->permissions()->sync($permissions_id);

         $users=\App\Models\User::factory(10)->create();
         \App\Models\User::factory()->create([
             'name'=>'rodrigue',
             'email'=>'rodriguechot@gmail.com',
             'role_id'=>2
         ]);

         foreach($users as $user){
             $user->image()->save(Image::factory()->make());
         }

         \App\Models\Category::factory(10)->create();
         \App\Models\Category::factory()->create(['name'=>'sans-categorie']);
         $posts=\App\Models\Post::factory(60)->create();
         \App\Models\Comment::factory(100)->create();
         \App\Models\Tag::factory(10)->create();

         foreach($posts as $post){
            $tag_ids=[];
            $tag_ids[]=Tag::all()->random()->id;
            $tag_ids[]=Tag::all()->random()->id;
            $tag_ids[]=Tag::all()->random()->id;

            $post->tags()->sync($tag_ids);
            $post->image()->save(Image::factory()->make());
         }
         Setting::factory(1)->create();
    }
}
