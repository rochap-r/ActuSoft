<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Role;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

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
         $users=\App\Models\User::factory(10)->create();

         foreach($users as $user){
             $user->image()->save(Image::factory()->make());
         }

         \App\Models\Category::factory(10)->create();
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
    }
}
