<?php

namespace Database\Seeders;

use App\Enums\SymptomSeverityEnum;
use App\Models\Symptom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Symptom::factory(3)->create();
        Symptom::create([
            'name' => 'Skin-related Symptoms',
            'description' => 'test',
            'severity' => SymptomSeverityEnum::Mild(),
        ]);
        Symptom::create([
            'name' => 'Nasal Symptoms',
            'description' => 'test',
            'severity' => SymptomSeverityEnum::Mild(),
        ]);
        Symptom::create([
            'name' => 'Ocular Symptoms',
            'description' => 'test',
            'severity' => SymptomSeverityEnum::Mild(),
        ]);
        Symptom::create([
            'name' => 'Gastrointestinal Symptoms',
            'description' => 'test',
            'severity' => SymptomSeverityEnum::Mild(),
        ]);
        Symptom::create([
            'name' => 'Psychological symptoms',
            'description' => 'test',
            'severity' => SymptomSeverityEnum::Mild(),
        ]);
        Symptom::create([
            'name' => 'Respiratory Symptoms',
            'description' => 'test',
            'severity' => SymptomSeverityEnum::Severe(),
        ]);
        Symptom::create([
            'name' => 'Musculoskeletal symptoms',
            'description' => 'test',
            'severity' => SymptomSeverityEnum::Severe(),
        ]);
        Symptom::create([
            'name' => 'Oral Symptoms',
            'description' => 'test',
            'severity' => SymptomSeverityEnum::Severe(),
        ]);
        Symptom::create([
            'name' => 'Cardiovascular Symptoms',
            'description' => 'test',
            'severity' => SymptomSeverityEnum::Severe(),
        ]);
        Symptom::create([
            'name' => 'Systemic Symptoms',
            'description' => 'test',
            'severity' => SymptomSeverityEnum::Severe(),
        ]);
        Symptom::create([
            'name' => 'Anaphylaxis Symptoms',
            'description' => 'test',
            'severity' => SymptomSeverityEnum::Severe(),
        ]);
        Symptom::create([
            'name' => 'Neurological symptoms',
            'description' => 'test',
            'severity' => SymptomSeverityEnum::Severe(),
        ]);
    }
}
