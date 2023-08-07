<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\Pronoun;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PronounpageFactory extends Factory
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
            'pronoun_id'=>Pronoun::all()->random()->id,
            'page_id'=>Page::all()->random()->id,
        ];
    }
}
