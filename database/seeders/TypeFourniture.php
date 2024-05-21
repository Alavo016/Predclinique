<?php

namespace Database\Seeders;

use App\Models\Type_fourniture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeFourniture extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typesFourniture = [
            [
                'nom' => 'Diagnostic',
            ],
            [
                'nom' => 'Traitement',
            ],
            [
                'nom' => 'Protection',
            ],
            [
                'nom' => 'Chirurgie',
            ],
            [
                'nom' => 'Hygiène',
            ],
            [
                'nom' => 'Soins de plaies',
            ],
            [
                'nom' => 'Diagnostic par imagerie',
            ],
            [
                'nom' => 'Réhabilitation',
            ],
        ];

        foreach ($typesFourniture as $type) {
            Type_fourniture::create($type);
        }
    }
}

