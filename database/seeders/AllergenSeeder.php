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
        Allergen::create(['name' => 'Dairy products (eg: milk)']);
        Allergen::create(['name' => 'Eggs (eg: chicken eggs)']);
        Allergen::create(['name' => 'Tree nuts (eg: almonds)']);
        Allergen::create(['name' => 'Soybeans (eg: soy milk)']);
        Allergen::create(['name' => 'Wheat (eg: roti canai)']);
        Allergen::create(['name' => 'Seeds (eg: sesame seeds)']);
        Allergen::create(['name' => 'Fish (eg: keropok lekor)']);
        Allergen::create(['name' => 'Shellfish (eg: shrimp)']);
        Allergen::create(['name' => 'Chicken meat (eg: fried chicken)']);
        Allergen::create(['name' => 'Beef meat (eg: satay)']);
        Allergen::create(['name' => 'Mutton (eg: goat curry)']);
        Allergen::create(['name' => 'Duck meat (eg: duck rice)']);
        Allergen::create(['name' => 'Pork meat (eg: bak kut teh)']);
        Allergen::create(['name' => 'Sulfites (eg: dried fruits)']);
        Allergen::create(['name' => 'Chickpeas (eg: hummus)']);
        Allergen::create(['name' => 'Lentils (eg: lentil soup)']);
        Allergen::create(['name' => 'Peas (eg: green peas)']);
        Allergen::create(['name' => 'Potatoes (eg: mashed potato)']);
        Allergen::create(['name' => 'Soy sauce (eg: for seasoning)']);
        Allergen::create(['name' => 'Fish sauce (eg: tom yam)']);
        Allergen::create(['name' => 'Shellfish extract (eg: broth)']);
        Allergen::create(['name' => 'MSG (eg: monosodium glutamate)']);
        Allergen::create(['name' => 'Food dyes (eg: Red 40)']);
        Allergen::create(['name' => 'Preservatives']);
        Allergen::create(['name' => 'Artificial sweeteners']);
        Allergen::create(['name' => 'Penicillins (eg: penicillin)']);
        Allergen::create(['name' => 'Cephalosporin (eg: cefaclor)']);
        Allergen::create(['name' => 'Sulfonamides (eg: Mafenide)']);
        Allergen::create(['name' => 'Ibuprofen (eg: Midol)']);
        Allergen::create(['name' => 'Aspirin (eg: Advil)']);
        Allergen::create(['name' => 'ARBs (eg: losartan)']);
        Allergen::create(['name' => 'Acetaminophen (eg: Panadol)']);
        Allergen::create(['name' => 'Anticonvulsants (eg: valproic)']);
        Allergen::create(['name' => 'Insulin (eg: Humulin)']);
        Allergen::create(['name' => 'NSAIDs drugs (eg: ibuprofen)']);
        Allergen::create(['name' => 'ACE inhibitors (eg: lisinopril)']);
    }
}
