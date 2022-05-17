<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{

    protected $model=Comment::class;
    public function definition()
    {
        return [
            'body'=>$this->faker->paragraph(),
            'post_id'=>Post::all()->random(1)->first()->id,
            'user_id'=>User::all()->random(1)->first()->id
        ];
    }
}
