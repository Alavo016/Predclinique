<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disponibilite;
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
            for ($i = 0; $i < 5; $i++) {
                $heureDebut = $faker->numberBetween(8, 17) . ':00'; // Heure de début entre 8h et 17h
                $heureFin = date('H:i', strtotime($heureDebut) + 4 * 3600); // Ajoute 4 heures à l'heure de début

                Disponibilites::create([
                    'doctor_id' => $doctor->id,
                    'jour' => $faker->date(),
                    'heure_debut' => $heureDebut,
                    'heure_fin' => $heureFin,
                    'notes' => $faker->sentence,
                    'status' => $faker->randomElement([0, 1]), // Génère aléatoirement 0 ou 1
                ]);
            }
        }
    }
}
