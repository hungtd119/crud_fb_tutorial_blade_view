<?php

namespace Database\Factories;

use App\Models\Pages;
use App\Models\Pronouns;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interactions>
 */
class InteractionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id'=>$this->faker->numerify("########"),
            'bg'=>$this->faker->colorName(),
            'image'=>$this->faker->imageUrl,
            'page_id'=>Pages::all()->random()->id,
            'soundText'=>Pronouns::all()->random()->id,
        ];
    }
}
