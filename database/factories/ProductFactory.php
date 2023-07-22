<?php

namespace Database\Factories;

use Illuminate\Validation\Factory;

class ProductFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->description(),
            'price' => $this->faker->price(),
        ];
    }

}
