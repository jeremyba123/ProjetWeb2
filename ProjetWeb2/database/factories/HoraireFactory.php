<?php

namespace Database\Factories;

use App\Models\Groupe;
use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Horaire;

class HoraireFactory extends Factory
{
    protected $model = Horaire::class;

    /**
     * Définit la structure d'une instance Horaire générée.
     *
     * @return array Les attributs de l'instance Horaire
     */
    public function definition()
    {
        // Obtient la date actuelle
        $currentDate = now();

        // Génère une date aléatoire dans une période de 10 jours
        $date = $this->faker->dateTimeBetween("2023-05-21", "2023-05-31");

        // Génère une heure aléatoire au format "Heures:Minutes"
        $heure = $this->faker->time("H:i");

        return [
            'date' => $date,
            'heure' => $heure,
            'groupe_id' => Groupe::inRandomOrder()->first()->id
        ];
    }
}
