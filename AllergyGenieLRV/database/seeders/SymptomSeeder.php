<?php

namespace Database\Seeders;

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
        Symptom::create(['name' => 'Skin-related Symptoms']);
        Symptom::create(['name' => 'Nasal Symptoms']);
        Symptom::create(['name' => 'Ocular Symptoms']);
        Symptom::create(['name' => 'Gastrointestinal Symptoms']);
        Symptom::create(['name' => 'Respiratory Symptoms']);
        Symptom::create(['name' => 'Oral Symptoms']);
        Symptom::create(['name' => 'Cardiovascular Symptoms']);
        Symptom::create(['name' => 'Systemic Symptoms']);
        Symptom::create(['name' => 'Anaphylaxis Symptoms']);
        Symptom::create(['name' => 'Neurological symptoms']);
        Symptom::create(['name' => 'Musculoskeletal symptoms']);
        Symptom::create(['name' => 'Psychological symptoms']);
    }
}










