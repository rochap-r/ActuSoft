<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * php artisan make:factory RoleFactory   [--model=Role pas fonctionner ds mon cas]
     */

    protected $model= Role::class;
    public function definition()
    {
        return [
            'name'=>'user',
        ];
    }
}
