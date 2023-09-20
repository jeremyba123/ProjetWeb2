<?php

namespace Database\Factories;

use App\Models\Groupe;
use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Horaire;

class HoraireFactory extends Factory
{
    protected $model = Horaire::class;

    public function definition()
    {
        // Get the current date
        $currentDate = now();

        // Generate a random date within a 10-day time period
        $date = $this->faker->dateTimeBetween("2023-05-21", "2023-05-31");
        $heure = $this->faker->time("H:i");

        return [
            'date' => $date,
            'heure' => $heure,
            'groupe_id' => Groupe::inRandomOrder()->first()->id
        ];
    }
}
