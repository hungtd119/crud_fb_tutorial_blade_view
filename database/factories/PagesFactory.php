<?php

namespace Database\Factories;

use App\Models\Pages;
use App\Models\Stories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pages>
 */
class PagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pages::class;
    public function definition()
    {
        return [
            'id'=>$this->faker->numerify("########"),
            'image'=>$this->faker->imageUrl,
            'sentence'=>$this->faker->sentence,
            'audio'=>$this->faker->url,
            'page_number'=>$this->faker->numerify,
            'story_id'=>Stories::all()->random()->id,
        ];
    }
}
