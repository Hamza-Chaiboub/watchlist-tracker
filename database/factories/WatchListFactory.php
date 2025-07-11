<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WatchList>
 */
class WatchListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $userPairs = [];
        do {
            $userId = $this->faker->numberBetween(1, 100);
            $contentId = $this->faker->numberBetween(1, 100);
            $pair = "$userId-$contentId";
        } while (in_array($pair, $userPairs));
        $userPairs[] = $pair;
        return [
            'user_id' => $userId,
            'content_id' => $contentId,
            'status_id' => $this->faker->numberBetween(1, 3),
            'rating' => $this->faker->numberBetween(1, 10)
        ];
    }
}
