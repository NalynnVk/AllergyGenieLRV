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
            'description' => 'Developed hives on the arms',
        ]);
        Symptom::create([
            'name' => 'Nasal Symptoms',
            'description' => 'Experienced runny nose and sneezing',
        ]);
        Symptom::create([
            'name' => 'Ocular Symptoms',
            'description' => 'Watery eyes and itchiness',
        ]);
        Symptom::create([
            'name' => 'Gastrointestinal Symptoms',
            'description' => 'Stomach cramps and diarrhea',
        ]);
        Symptom::create([
            'name' => 'Psychological symptoms',
            'description' => 'Anxiety and restlessness at a party',
        ]);
        Symptom::create([
            'name' => 'Respiratory Symptoms',
            'description' => 'Wheezing and shortness of breath at home',
        ]);
        Symptom::create([
            'name' => 'Musculoskeletal symptoms',
            'description' => 'Joint pain and stiffness triggered',
        ]);
        Symptom::create([
            'name' => 'Oral Symptoms',
            'description' => 'Swollen tongue and mouth sores',
        ]);
        Symptom::create([
            'name' => 'Cardiovascular Symptoms',
            'description' => 'Rapid heartbeat and dizziness',
        ]);
        Symptom::create([
            'name' => 'Systemic Symptoms',
            'description' => 'Overall fatigue and weakness',
        ]);
        Symptom::create([
            'name' => 'Anaphylaxis Symptoms',
            'description' => 'Severe swelling and difficulty breathing',
        ]);
        Symptom::create([
            'name' => 'Neurological symptoms',
            'description' => 'Experienced dizziness and confusion',
        ]);
    }
}
