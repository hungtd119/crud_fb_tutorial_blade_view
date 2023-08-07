<?php

namespace Database\Factories;

use App\Models\Audio;
use App\Models\Text;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pronoun>
 */
class PronounFactory extends Factory
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
            'text'=>Text::all()->random()->id,
            'audio'=>Audio::all()->random()->id,
        ];
    }
}
