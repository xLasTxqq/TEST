<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class ProductFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => Str::random(10),
            'description' => Str::random(20),
            'img' => Str::random(10).'.jpg',
            'cost' => mt_rand(1,10000),
            'idcategory' => mt_rand(1,10),
        ];
    }
}
