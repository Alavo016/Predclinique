<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Consultation;
use App\Models\Consultations;
use Carbon\Carbon;

class ConsultationSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Obtenez tous les patients (utilisateurs avec le rôle 1)
        $patients = User::where('id_role', 1)->get();

        // Obtenez tous les docteurs (utilisateurs avec le rôle 2)
        $doctors = User::where('id_role', 2)->get();

        // Liste de symptômes réels
        $symptoms = [
            'Fever', 'Cough', 'Fatigue', 'Headache', 'Shortness of breath',
            'Chest pain', 'Nausea', 'Vomiting', 'Diarrhea', 'Sore throat'
        ];

        // Boucle sur tous les patients
        foreach ($patients as $patient) {
            // Créer au moins trois consultations pour chaque patient
            for ($i = 0; $i < 3; $i++) {
                // Sélectionner un docteur aléatoire
                $doctor = $doctors->random();

                // Générer une date et heure de début aléatoire
                $date = Carbon::now()->subDays(rand(1, 30))->setTime(rand(8, 15), rand(0, 59));

                // Générer une heure de fin après l'heure de début
                $heureFin = (clone $date)->addHours(rand(1, 3))->addMinutes(rand(0, 59));

                // Sélectionner aléatoirement des symptômes et les convertir en chaîne de caractères
                $selectedSymptoms = implode(', ', $faker->randomElements($symptoms, rand(4, 6)));

                // Créer une consultation avec les nouveaux attributs
                $consultation = new Consultations();
                $consultation->date = $date;
                $consultation->heure_fin = $heureFin;
                $consultation->motif = $faker->sentence();
                $consultation->symptomes = $selectedSymptoms;
                $consultation->diagnostic = $faker->sentence();
                $consultation->user_id = $patient->id;
                $consultation->doctor_id = $doctor->id;
                $consultation->temperature = $faker->randomFloat(1, 36.0, 40.0); // Température entre 36.0 et 40.0
                $consultation->tension = $faker->randomFloat(1, 90.0, 140.0); // Tension entre 90.0 et 140.0
                $consultation->poids = $faker->randomFloat(1, 50.0, 100.0); // Poids entre 50.0 et 100.0 kg
                $consultation->taille = $faker->randomFloat(2, 1.5, 2.0); // Taille entre 1.5m et 2.0m
                $consultation->imc = $consultation->poids / ($consultation->taille * $consultation->taille); // Calcul de l'IMC
                $consultation->save();
            }
        }
    }
}
