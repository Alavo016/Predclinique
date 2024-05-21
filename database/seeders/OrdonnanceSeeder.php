<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultation;
use App\Models\Consultations;
use App\Models\Ordonnance;
use App\Models\ordonnances;
use Carbon\Carbon;

class OrdonnanceSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Liste de vrais médicaments
        $medicaments = [
            'Paracetamol', 'Ibuprofen', 'Amoxicillin', 'Ciprofloxacin', 'Metformin',
            'Omeprazole', 'Atorvastatin', 'Simvastatin', 'Lisinopril', 'Levothyroxine'
        ];

        // Obtenez toutes les consultations
        $consultations = Consultations::all();

        // Boucle sur toutes les consultations
        foreach ($consultations as $consultation) {
            // Sélectionner aléatoirement des médicaments et les convertir en chaîne de caractères
            $selectedMedicaments = $faker->randomElements($medicaments, rand(3, 5));
            $medicamentsString = implode(', ', $selectedMedicaments);

            // Générer une posologie pour chaque médicament
            $posologies = array_map(function ($medicament) use ($faker) {
                return $medicament . ': ' . $faker->sentence();
            }, $selectedMedicaments);
            $posologieString = implode(', ', $posologies);

            // Créer une ordonnance
            $ordonnance = new ordonnances();
            $ordonnance->medicaments = $medicamentsString;
            $ordonnance->posologie = $posologieString;
            $ordonnance->date = Carbon::now();
            $ordonnance->save();

            // Mettre à jour la consultation avec l'ID de l'ordonnance
            $consultation->ordonnance_id = $ordonnance->id;
            $consultation->save();
        }
    }
}
