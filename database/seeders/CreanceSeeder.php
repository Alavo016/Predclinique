<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        // Obtenir tous les IDs des utilisateurs ayant un id_role égal à 1 (patients)
        $patientIds = User::where('id_role', 1)->pluck('id')->toArray();

        // Limiter le nombre maximum de patients à 150
        $patientIds = array_slice($patientIds, 0, 150);

        // Créer au plus 10 créances pour chaque patient
        foreach ($patientIds as $patientId) {
            // Nombre de créances aléatoire pour ce patient (au plus 10)
            $numCreances = rand(1, 10);

            for ($i = 0; $i < $numCreances; $i++) {
                $montantTotal = rand(3000, 100000); // Montant total aléatoire entre 3000 et 100000
                $montantPaye = rand(0, $montantTotal); // Montant payé aléatoire entre 0 et le montant total
                $montantRestant = $montantTotal - $montantPaye; // Calculer le montant restant

                $date = Carbon::now()->subYears(random_int(0, 3));

                // Créer une nouvelle créance avec des attributs aléatoires pour ce patient
                Creances::create([
                    'montant_tot' => $montantTotal,
                    'date' => $date,
                    'montant_res' => $montantRestant,
                    'montant_paye' => $montantPaye,
                    'patient_id' => $patientId,
                ]);
            }
        }
    }
}

