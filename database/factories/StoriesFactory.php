<?php

namespace Database\Factories;

use App\Models\Stories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stories>
 */
class StoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Stories::class;
    public function definition()
    {
        return [
            'id'=>$this->faker->numerify("########"),
            'title' => $this->faker->title,
            'image' => $this ->faker->imageUrl,
            'author'=>$this->faker->name,
            'illustrator'=>$this->faker->name,
            'level'=>$this->faker->word,
        ];
    }
}
