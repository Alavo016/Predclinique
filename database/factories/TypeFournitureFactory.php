<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type_fourniture>
 */
class TypeFournitureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     */
    private $categories = ['Diagnostic', 'Traitement', 'Protection', 'Chirurgie', 'Hygiène', 'Soins de plaies', 'Diagnostic par imagerie', 'Réhabilitation'];
    private $usedNames = [];

    public function definition(): array
    {
        $category = $this->faker->randomElement($this->categories);
        $name = $this->faker->unique()->word;

        // Vérifier si le nom est déjà utilisé, sinon en générer un nouveau
        while (in_array($name, $this->usedNames)) {
            $name = $this->faker->unique()->word;
        }

        $this->usedNames[] = $name;

        return [
            'nom' => $name,
            'categorie' => $category,
        ];
    }
}
