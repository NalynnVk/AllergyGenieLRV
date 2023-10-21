<?php

namespace Database\Seeders;

use App\Models\FirstAidStep;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirstAidStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FirstAidStep::factory(3)->create();
    }
}
