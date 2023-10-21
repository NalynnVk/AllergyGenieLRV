<?php

namespace Database\Seeders;

use App\Models\Dependant;
use App\Models\Dependants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dependant::factory(3)->create();
    }
}
