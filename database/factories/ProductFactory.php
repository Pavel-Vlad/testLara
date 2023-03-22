<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article' => $this->faker->name(),
            'name' => $this->faker->name(),
            'status' => $this->faker->name(),
            'data' => '{"a":"hhh", "b":"L"}',
        ];
    }

}
