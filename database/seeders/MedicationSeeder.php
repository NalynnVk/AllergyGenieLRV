<?php

namespace Database\Seeders;

use App\Models\Medication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Medication::create(['name' => 'Aqueous cream']);
        Medication::create(['name' => 'Cetirizine']);
        Medication::create(['name' => 'Loratadine']);
        Medication::create(['name' => 'Fexofenadine']);
        Medication::create(['name' => 'Desloratadine']);
        Medication::create(['name' => 'Hydroxyzine']);
        Medication::create(['name' => 'Diphenhydramine']);
        Medication::create(['name' => 'Prednisone']);
        Medication::create(['name' => 'Prednisolone']);
        Medication::create(['name' => 'Methylprednisolone']);
        Medication::create(['name' => 'Epinephrine (EpiPen)']);
        Medication::create(['name' => 'Diphenhydramine']);
        Medication::create(['name' => 'Ranitidine']);
        Medication::create(['name' => 'Cimetidine']);
        Medication::create(['name' => 'Omeprazole']);
        Medication::create(['name' => 'Pantoprazole']);
        Medication::create(['name' => 'Montelukast']);
        Medication::create(['name' => 'Fluticasone']);
        Medication::create(['name' => 'Triamcinolone cream']);
        Medication::create(['name' => 'Clobetasol']);
        Medication::create(['name' => 'Ebastine']);
        Medication::create(['name' => 'Azathioprine']);
        Medication::create(['name' => 'Cyclosporine']);
        Medication::create(['name' => 'Tacrolimus (Protopic)']);
        Medication::create(['name' => 'Olopatadine']);
        Medication::create(['name' => 'Benadryl (Diphenhydramine) cream']);
        Medication::create(['name' => 'Betamethasone']);
        Medication::create(['name' => 'Fluocinonide']);
        Medication::create(['name' => 'Ephedrine']);
        Medication::create(['name' => 'Theophylline']);
        Medication::create(['name' => 'Chlorpheniramine']);
        Medication::create(['name' => 'Levocetirizine']);
        Medication::create(['name' => 'Azelastine']);
        Medication::create(['name' => 'Doxepin']);
        Medication::create(['name' => 'Mepolizumab']);
        Medication::create(['name' => 'Dupilumab']);
        Medication::create(['name' => 'Rupatadine']);
        Medication::create(['name' => 'Famotidine']);
        Medication::create(['name' => 'Chlorpromazine']);
        Medication::create(['name' => 'Leukotriene inhibitors']);
        Medication::create(['name' => 'Dexamethasone']);
        Medication::create(['name' => 'Mometasone']);
        Medication::create(['name' => 'Tranexamic acid']);
        Medication::create(['name' => 'Dimetapp']);
        Medication::create(['name' => 'Prednicarbate']);
        Medication::create(['name' => 'Budesonide']);
        Medication::create(['name' => 'Olopatadine nasal spray']);
        Medication::create(['name' => 'Desonide']);
        Medication::create(['name' => 'Cetirizine eye drops']);
        Medication::create(['name' => 'Ketotifen']);
        Medication::create(['name' => 'Hydrocortisone cream']);
    }
}
