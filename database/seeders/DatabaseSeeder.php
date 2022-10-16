<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Role;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\User;
use App\Models\UserComment;
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
        User::truncate();
        Role::truncate();
        UserComment::truncate();
        Category::truncate();
        Post::truncate();
        Comment::truncate();
        Tag::truncate();
        Image::truncate();
        Schema::enableForeignKeyConstraints();


        /**generation des fausses données */
        Role::factory(1)->create();
        Role::factory(1)->create(['name'=>"admin"]);

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

        $users=User::factory(10)->create();
        User::factory()->create([
             'name'=>'rodrigue',
             'email'=>'rodriguechot@gmail.com',
             'role_id'=>2
         ]);

         foreach($users as $user){
             $user->image()->save(Image::factory()->make());
         }

        Category::factory(10)->create();
        Category::factory()->create(['name'=>'sans-categorie']);

        $userComments=UserComment::factory(10)->create();
        foreach($userComments as $user){
            $user->image()->save(Image::factory()->make());
        }

        $posts=Post::factory(60)->create();
        Comment::factory(100)->create();
        Tag::factory(10)->create();

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
