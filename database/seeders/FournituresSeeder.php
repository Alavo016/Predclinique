<?php

namespace Database\Seeders;

use App\Models\Fournitures;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FournituresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fournitures = [
            [
               
                'type_fourniture_id' => 1,
                'nom' => 'Stéthoscope',
                'quantite' => 50,
                'seuil_minimum' => 10,
                'prix_unitaire' => 25.00,
            ],
            [

                'type_fourniture_id' => 2,
                'nom' => 'Tensiomètre',
                'quantite' => 30,
                'seuil_minimum' => 5,
                'prix_unitaire' => 45.00,
            ],
            [

                'type_fourniture_id' => 3,
                'nom' => 'Thermomètre',
                'quantite' => 40,
                'seuil_minimum' => 8,
                'prix_unitaire' => 20.00,
            ],
            [

                'type_fourniture_id' => 4,
                'nom' => 'Oxymètre de pouls',
                'quantite' => 20,
                'seuil_minimum' => 4,
                'prix_unitaire' => 60.00,
            ],
            [

                'type_fourniture_id' => 5,
                'nom' => 'Garrot',
                'quantite' => 60,
                'seuil_minimum' => 12,
                'prix_unitaire' => 10.00,
            ],
            [

                'type_fourniture_id' => 6,
                'nom' => 'Seringue',
                'quantite' => 70,
                'seuil_minimum' => 15,
                'prix_unitaire' => 5.00,
            ],
            [

                'type_fourniture_id' => 7,
                'nom' => 'Pansement',
                'quantite' => 100,
                'seuil_minimum' => 20,
                'prix_unitaire' => 8.00,
            ],
            [

                'type_fourniture_id' => 8,
                'nom' => 'Gants médicaux',
                'quantite' => 80,
                'seuil_minimum' => 16,
                'prix_unitaire' => 12.00,
            ],
            [

                'type_fourniture_id' => 9,
                'nom' => 'Bande de gaze',
                'quantite' => 90,
                'seuil_minimum' => 18,
                'prix_unitaire' => 6.00,
            ],
            [

                'type_fourniture_id' => 10,
                'nom' => 'Masque chirurgical',
                'quantite' => 120,
                'seuil_minimum' => 24,
                'prix_unitaire' => 3.00,
            ],
        ];

        foreach ($fournitures as $fourniture) {
            Fournitures::create($fourniture);
        }
    }
}
