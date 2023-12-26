<?php

namespace Database\Factories;

use App\Models\Allergen;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AllergenPatient>
 */
class AllergenPatientFactory extends Factory
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
            'allergen_id' => Allergen::inRandomOrder()->pluck('id')->first(),
        ];
    }
}
