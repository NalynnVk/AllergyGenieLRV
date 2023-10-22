<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Allergen;
use App\Models\Dependant;
use App\Models\EmergencyContact;
use App\Models\FirstAidStep;
use App\Models\Insight;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\Symptom;
use App\Models\Tracking;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator 1',
            'email' => 'admin@admin.com',
            'phone_number' => '+018-189 6587',
            'password' => 'Admin1',
        ]);

        $this->call(UserSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(DependantSeeder::class);
        $this->call(AllergenSeeder::class);
        $this->call(MedicationSeeder::class);
        $this->call(SymptomSeeder::class);
        $this->call(TrackingSeeder::class);
        $this->call(EmergencyContactSeeder::class);
        $this->call(FirstAidStepSeeder::class);
        $this->call(InsightSeeder::class);
    }
}
