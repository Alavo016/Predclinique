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

        // Obtenez les spécialités que vous souhaitez analyser pour les statistiques
        $specialitesAvecTauxEleve = Specialites::whereIn('id', [2, 4, 6, 10])->get();
        $specialites = Specialites::all();

        foreach ($specialites as $specialite) {
            // Obtenez les médecins associés à cette spécialité
            $doctors = User::where('id_role', 2)->where('specialite_id', $specialite->id)->get();

            foreach ($doctors as $doctor) {
                // Obtenez les disponibilités avec un statut égal à 1 pour ce médecin
                $disponibilites = Disponibilites::where('doctor_id', $doctor->id)->where('status', 1)->get();

                foreach ($disponibilites as $disponibilite) {
                    // Générez un nombre plus élevé de rendez-vous pris pour certaines spécialités
                    $nombreRendezVousPris = $specialitesAvecTauxEleve->contains('id', $specialite->id) ? 10 : 3;

                    for ($i = 0; $i < $nombreRendezVousPris; $i++) {
                        // Créez un rendez-vous pour le médecin et le patient
                        $startDateTime = Carbon::parse($disponibilite->jour)
                            ->setTimeFromTimeString($disponibilite->heure_debut)
                            ->addHour(rand(0, 3));

                        // Vérifiez si le créneau horaire est disponible
                        $rendezVousExistants = Rendez_vous::where('doctor_id', $doctor->id)
                            ->where('date', '<=', $startDateTime->addHours(1)) // Supposez que chaque rendez-vous dure au moins 1 heure
                            ->where('date', '>=', $startDateTime)
                            ->exists();

                        // Si le médecin n'a pas de rendez-vous à ce créneau horaire, créez un nouveau rendez-vous
                        if (!$rendezVousExistants) {
                            $rendezVous = new Rendez_vous();
                            $rendezVous->date = $startDateTime;
                            $rendezVous->motif = $faker->sentence();
                            $rendezVous->statut = 'rdv pris';
                            $rendezVous->patient_id = $patients->random()->id;
                            $rendezVous->doctor_id = $doctor->id;
                            $rendezVous->specialites_id = $specialite->id;
                            $rendezVous->statut_paiement = 'Accepté';
                            $rendezVous->prix = $specialite->prix;
                            $rendezVous->save();
                        }
                    }

                    // Ajout de rendez-vous passés
                    for ($i = 0; $i < 10; $i++) {
                        $pastDate = Carbon::now()->subDays(rand(1, 60))->setTime(rand(8, 17), rand(0, 59));

                        $rendezVous = new Rendez_vous();
                        $rendezVous->date = $pastDate;
                        $rendezVous->motif = $faker->sentence();
                        $rendezVous->statut = 'rdv pris';
                        $rendezVous->patient_id = $patients->random()->id;
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
    }
}
