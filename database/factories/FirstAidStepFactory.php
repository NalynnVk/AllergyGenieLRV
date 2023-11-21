<?php

namespace Database\Factories;

use App\Models\FirstAidStep;
use App\Models\Symptom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FirstAidStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'step' => $this->faker->text(),
            // 'symptom_id' => Symptom::inRandomOrder()->pluck('id')->first(),
            // 'first_aid_step_id' => FirstAidStep::inRandomOrder()->pluck('id')->first(),
        ];
    }
}
