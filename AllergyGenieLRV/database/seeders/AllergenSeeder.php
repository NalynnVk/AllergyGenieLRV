<?php

namespace Database\Seeders;

use App\Models\Allergen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllergenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Allergen::factory(3)->create();
        Allergen::create(['name' => 'Dairy products']);
        Allergen::create(['name' => 'Eggs']);
        Allergen::create(['name' => 'Tree nuts']);
        Allergen::create(['name' => 'Soybeans']);
        Allergen::create(['name' => 'Wheat']);
        Allergen::create(['name' => 'Seeds']);
        Allergen::create(['name' => 'Fish']);
        Allergen::create(['name' => 'Shellfish']);
        Allergen::create(['name' => 'Chicken meat']);
        Allergen::create(['name' => 'Beef meat']);
        Allergen::create(['name' => 'Goat meat/Mutton']);
        Allergen::create(['name' => 'Duck meat']);
        Allergen::create(['name' => 'Pork meat']);
        Allergen::create(['name' => 'Sulfites']);
        Allergen::create(['name' => 'Chickpeas']);
        Allergen::create(['name' => 'Lentils']);
        Allergen::create(['name' => 'Peas']);
        Allergen::create(['name' => 'Potatoes']);
        Allergen::create(['name' => 'Soy sauce']);
        Allergen::create(['name' => 'Fish sauce']);
        Allergen::create(['name' => 'Shellfish extract']);
        Allergen::create(['name' => 'MSG']);
        Allergen::create(['name' => 'Food dyes']);
        Allergen::create(['name' => 'Preservatives']);
        Allergen::create(['name' => 'Artificial sweeteners']);
        Allergen::create(['name' => 'Penicillins']);
        Allergen::create(['name' => 'Cephalosporin']);
        Allergen::create(['name' => 'Sulfonamides']);
        Allergen::create(['name' => 'Ibuprofen']);
        Allergen::create(['name' => 'Aspirin']);
        Allergen::create(['name' => 'ARBs']);
        Allergen::create(['name' => 'Acetaminophen']);
        Allergen::create(['name' => 'Anticonvulsants']);
        Allergen::create(['name' => 'Insulin']);
        Allergen::create(['name' => 'NSAIDs drugs']);
        Allergen::create(['name' => 'ACE inhibitors']);
    }
}
