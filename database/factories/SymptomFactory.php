<?php

namespace Database\Factories;

use App\Models\Tracking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SymptomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            // 'description' => $this->faker->text(),
            // 'tracking_id' => Tracking::inRandomOrder()->pluck('id')->first(),
            // 'severity' => $this->faker->randomDigit()
        ];
    }
}
