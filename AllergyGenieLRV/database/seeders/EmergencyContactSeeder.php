<?php

namespace Database\Seeders;

use App\Models\EmergencyContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmergencyContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmergencyContact::factory(3)->create();
    }
}
