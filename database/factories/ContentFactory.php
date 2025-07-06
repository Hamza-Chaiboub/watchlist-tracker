<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'external_id' => $this->faker->unique()->randomNumber(),
            'title' => $this->faker->sentence(),
            'year' => $this->faker->year(),
            'type_id' => $this->faker->numberBetween(1, 5), // Assuming type IDs are between 1 and 5
            'poster_path' => $this->faker->imageUrl(640, 480, 'movies', true, 'Faker'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
