<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model=Image::class;
    public function definition()
    {
        return [
            'name'=>$this->faker->word(),
            'extension'=>'jpg',
            'path'=>'/public/images/' . $this->faker->word() . '.' . 'jpg',
        ];
    }
}
