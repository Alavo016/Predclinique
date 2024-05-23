<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Creance;
use App\Models\Creances;
use App\Models\User;
use Carbon\Carbon;

class CreanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtenez tous les IDs des utilisateurs ayant un id_role égal à 1 (patients)
        $patientIds = User::where('id_role', 1)->pluck('id')->toArray();

        // Créer 50 créances au hasard pour les patients
        for ($i = 0; $i < 50; $i++) {
            $montantTotal = rand(3000, 100000); // Montant total aléatoire entre 100 et 1000
            $montantPaye = rand(0, $montantTotal); // Montant payé aléatoire entre 0 et le montant total
            $montantRestant = $montantTotal - $montantPaye; // Calculer le montant restant

            $date = Carbon::now()->subYears(random_int(0, 3));

            // Créer une nouvelle créance avec des attributs aléatoires pour un patient
            Creances::create([
                'montant_tot' => $montantTotal,
                'date' => $date,
                'montant_res' => $montantRestant,
                'montant_paye' => $montantPaye,
                'patient_id' => $patientIds[array_rand($patientIds)], // Sélectionner un patient au hasard
            ]);
        }
    }
}
