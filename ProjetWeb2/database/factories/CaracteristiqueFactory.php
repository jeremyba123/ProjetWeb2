<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CaracteristiqueFactory extends Factory
{
    /**
     * Définit les attributs par défaut du modèle.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom" => $this->faker->word()
        ];
    }
}
