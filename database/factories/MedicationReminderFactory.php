<?php

namespace Database\Factories;

use App\Models\Medication;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MedicationReminderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //TODO: tukar user id kepada patient id
            'patient_id' => Patient::inRandomOrder()->pluck('id')->first(),
            'medication_id' => Medication::inRandomOrder()->pluck('id')->first(),
            'time_reminder' => $this->faker->time(),
        ];
    }
}
