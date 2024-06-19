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

        // Obtenez toutes les spécialités
        $specialites = Specialites::all();

        // Obtenez tous les médecins (utilisateurs avec le rôle 2)
        $doctors = User::where('id_role', 2)->get();

        foreach ($patients as $patient) {
            foreach ($doctors as $doctor) {
                // Créez au moins 3 rendez-vous pour chaque patient avec chaque médecin
                for ($i = 0; $i < 3; $i++) {
                    // Choisissez une spécialité au hasard pour ce médecin
                    $specialite = $specialites->random();

                    // Obtenez les disponibilités avec un statut égal à 1 pour ce médecin
                    $disponibilites = Disponibilites::where('doctor_id', $doctor->id)
                        ->where('status', 1)
                        ->get();

                    if ($disponibilites->isEmpty()) {
                        continue; // Si aucune disponibilité n'est disponible, passez au prochain tour
                    }

                    $disponibilite = $disponibilites->random();
                    $startDateTime = Carbon::parse($disponibilite->jour)
                        ->setTimeFromTimeString($disponibilite->heure_debut)
                        ->addMinutes(rand(0, Carbon::parse($disponibilite->heure_fin)->diffInMinutes($disponibilite->heure_debut) - 60));

                    // Créez un rendez-vous pour le médecin et le patient
                    $rendezVous = new Rendez_vous();
                    $rendezVous->date = $startDateTime;
                    $rendezVous->motif = $faker->sentence();
                    $rendezVous->statut = 'Rdv Pris';
                    $rendezVous->patient_id = $patient->id;
                    $rendezVous->doctor_id = $doctor->id;
                    $rendezVous->specialites_id = $specialite->id;
                    $rendezVous->statut_paiement = 'Accepté';
                    $rendezVous->prix = $specialite->prix;
                    $rendezVous->save();
                }
            }

            // Ajout de rendez-vous passés avec le statut "fini"
            for ($j = 0; $j < 10; $j++) {
                $pastDate = Carbon::now()->subDays(rand(1, 60))->setTime(rand(8, 17), rand(0, 59));

                // Choisissez une spécialité et un médecin au hasard pour les rendez-vous passés
                $specialite = $specialites->random();
                $doctors = User::where('id_role', 2)->where('specialite_id', $specialite->id)->get();

                if ($doctors->isEmpty()) {
                    continue; // Si aucun médecin n'est disponible, passez au prochain tour
                }

                $doctor = $doctors->random();

                // Créez un rendez-vous passé pour le médecin et le patient
                $rendezVous = new Rendez_vous();
                $rendezVous->date = $pastDate;
                $rendezVous->motif = $faker->sentence();
                $rendezVous->statut = 'Rdv Pris';
                $rendezVous->patient_id = $patient->id;
                $rendezVous->doctor_id = $doctor->id;
                $rendezVous->specialites_id = $specialite->id;
                $rendezVous->statut_paiement = 'Accepté';
                $rendezVous->prix = $specialite->prix;
                $rendezVous->fini = 1;
                $rendezVous->save();
            }
        }
    }
}
