<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Disponibilites;
use App\Models\Rendez_vous;
use App\Models\Specialites;
use Carbon\Carbon;

class RendezVousSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Obtenez tous les patients (utilisateurs avec le rôle 1)
        $patients = User::where('id_role', 1)->get();

        // Boucle sur tous les patients
        foreach ($patients as $patient) {
            // Obtenez tous les médecins
            $doctors = User::where('id_role', 2)->get();

            // Sélectionnez jusqu'à 5 médecins aléatoires
            $selectedDoctors = $doctors->random(min($doctors->count(), 5));

            // Boucle sur les médecins sélectionnés
            foreach ($selectedDoctors as $doctor) {
                $specialiteId = $doctor->specialite_id;

                // Maintenant, vous pouvez utiliser cet ID pour récupérer la spécialité
                $specialite = Specialites::find($specialiteId);


                // Obtenez la disponibilité du médecin
                $disponibilite = Disponibilites::where('doctor_id', $doctor->id)->first();

                // Vérifiez si la disponibilité existe
                if ($disponibilite) {
                    // Créez un rendez-vous pour le médecin et le patient
                    $rendezVous = new Rendez_vous();
                    $rendezVous->date = Carbon::parse($disponibilite->jour)
                        ->setTimeFromTimeString($disponibilite->heure_debut)
                        ->addHour(rand(0, 3)); // Ajoutez une durée aléatoire de 0 à 3 heures au créneau horaire
                    $rendezVous->motif = $faker->sentence();
                    $rendezVous->statut = $faker->randomElement(['rdv pris', 'rdv non pris']);
                    $rendezVous->patient_id = $patient->id;
                    $rendezVous->doctor_id = $doctor->id;
                    $rendezVous->specialites_id = $specialiteId; // Utilisez l'identifiant de la spécialité du médecin
                    $rendezVous->statut_paiement = $rendezVous->statut === 'rdv pris' ? 'Accepté' : 'Refusé';
                    $rendezVous->prix = $specialite->prix; // Utilisez le prix de la spécialité du médecin
                    $rendezVous->save();
                }
            }
        }
    }
}
