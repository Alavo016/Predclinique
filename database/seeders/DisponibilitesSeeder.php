<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disponibilites;
use App\Models\User;
use Faker\Factory as Faker;

class DisponibilitesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $doctors = User::where('id_role', 2)->get();

        foreach ($doctors as $doctor) {
            // Générer des disponibilités pour les deux prochains mois
            $startDate = now()->startOfDay(); // Date de début à partir d'aujourd'hui
            $endDate = now()->addMonths(2)->endOfDay(); // Date de fin dans deux mois

            // Parcourir les dates de début jusqu'à la date de fin
            while ($startDate <= $endDate) {
                // Vérifier si c'est un jour de semaine (du lundi au vendredi)
                if ($startDate->isWeekday()) {
                    // Générer une heure de début aléatoire entre 8h et 17h
                    $heureDebut = $faker->numberBetween(8, 17) . ':00'; 
                    // Ajouter 4 heures à l'heure de début pour obtenir l'heure de fin
                    $heureFin = $startDate->copy()->addHours(4)->format('H:i');

                    Disponibilites::create([
                        'doctor_id' => $doctor->id,
                        'jour' => $startDate->format('Y-m-d'),
                        'heure_debut' => $heureDebut,
                        'heure_fin' => $heureFin,
                        'notes' => $faker->sentence,
                        'status' => $faker->randomElement([0, 1]),
                    ]);
                }
                
                // Passer à la prochaine journée
                $startDate->addDay();
            }
        }
    }
}
