<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MedicationFactory extends Factory
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
            'dosage' => $this->faker->randomDigitNotNull(),
            'time' => $this->faker->dateTime(),
            'patient_id' => Patient::inRandomOrder()->pluck('id')->first(),
            'frequency' => $this->faker->word(),
        ];
    }
}
