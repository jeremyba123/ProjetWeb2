<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Forfait;

class ForfaitFactory extends Factory
{
    protected $model = Forfait::class;

    /**
     * Définit les attributs par défaut du modèle Forfait.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->unique()->randomElement(['Forfait 1', 'Forfait 2', 'Forfait 3']),
            'prix' => $this->faker->unique()->randomFloat(2, 10, 200), // Random price between 10 and 200
            'jour' => $this->faker->unique()->randomElement([2, 5, 10]), // Unique choice of 2, 5, or 10 days

        ];
    }

    /**
     * Configure l'instance de Forfait après sa création.
     *
     * @return void
     */
    public function configure()
    {
        return $this->afterCreating(function (Forfait $forfait) {
            // Ensure unique combinations of nom, prix, and jour
            $forfait->update([
                'nom' => 'Forfait ' . $forfait->id, // Use the ID to make it unique
            ]);
        });
    }
}
