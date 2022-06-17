<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->randomDigit(),
            'prix' => $this->faker->randomDigit(),
            'Designations' => $this->faker->word(),
            'image' => $this->faker->imageUrl(640, 480, 'phons', true),
            //
        ];
    }
}
