<?php

namespace Database\Factories;

use App\Models\Allergen;
use App\Models\Patient;
use App\Models\Symptom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TrackingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => Patient::inRandomOrder()->pluck('id')->first(),
            'symptom_id' => Symptom::inRandomOrder()->pluck('id')->first(),
            'allergen_id' => Allergen::inRandomOrder()->pluck('id')->first(),
            'notes' => $this->faker->text(),
            // 'item_ingested' => $this->faker->text(),
            'severity' => $this->faker->randomDigit(),
        ];
    }
}
