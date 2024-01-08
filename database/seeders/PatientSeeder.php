<?php

namespace Database\Seeders;

use App\Enums\RegistrationStatusEnum;
use App\Models\AllergenPatient;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::factory(5)->create();

        $user = User::factory()->has(
            Patient::factory(1),
        )->create([
            'name' => 'Patient 1',
            'email' => 'patient@gmail.com',
            'email_verified_at' => now(),
            'phone_number' => '0123456789',
            'password' => 'password',
            'registration_status' => RegistrationStatusEnum::Approved(),
        ]);
    }
}
