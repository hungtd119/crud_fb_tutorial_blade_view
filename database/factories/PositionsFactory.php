<?php

namespace Database\Factories;

use App\Models\Interactions;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Positions>
 */
class PositionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id'=>$this->faker->numerify('########'),
            'position_x'=>$this->faker->numerify("###"),
            'position_y'=>$this->faker->numerify("###"),
            'width'=>$this->faker->numerify("###"),
            'height'=>$this->faker->numerify("###"),
            'interaction_id'=>Interactions::all()->random()->id,
        ];
    }
}
