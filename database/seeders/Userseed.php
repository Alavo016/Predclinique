<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class Userseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $faker = Faker::create();

            for ($i = 0; $i < 1000; $i++) {
                $role_id = $faker->numberBetween(1, 3);
                $specialite_id = null;
                $allergie = null;

                if ($role_id == 1) {
                    $allergie = $faker->sentence;
                } elseif ($role_id == 2 || $role_id == 3) {
                    $specialite_id = $faker->numberBetween(1, 11);
                }

                User::create([
                    'id_role' => $role_id,
                    'specialite_id' => $specialite_id,

                    'name' => $faker->name,
                    'prenom' => $faker->firstName,
                    'pseudo' => $faker->userName,
                    'email' => $faker->unique()->safeEmail,
                    'telephone' => $faker->phoneNumber,
                    'sexe' => $faker->randomElement(['M', 'F']),
                    'nationalite' => $faker->country,
                    'ville' => $faker->city,
                    'photo' => 'storage/avatars/user.jpg',
                    'etat_civile' => $faker->randomElement(['Célibataire', 'Marié(e)', 'Divorcé(e)']),
                    'allergie' => $allergie,
                    'status' => $faker->randomElement(['0', '1']),
                    'date_naissance' => $faker->date,
                    'email_verified_at' => now(),
                    'password' => Hash::make('password123'),
                    'remember_token' => Str::random(10),
                ]);
            }
        }}
    }
