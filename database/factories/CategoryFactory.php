<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => Str::random(10),
            'description' => Str::random(20),
            'img' => Str::random(10).'.jpg',
        ];
    }
}
