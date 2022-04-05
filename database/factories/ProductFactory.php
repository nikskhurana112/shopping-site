<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            "Title" => $this->faker->text(30),
            "Description" => $this->faker->text(255),
            "Price" => $this->faker->randomDigit,
            "ImagePath" => $this->faker->imageUrl($width = 200, $height = 200),
        ];
    }
}
