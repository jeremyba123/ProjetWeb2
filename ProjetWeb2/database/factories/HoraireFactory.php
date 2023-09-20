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
        $date = $this->faker->dateTimeBetween($currentDate, $currentDate->addDays(10));

        // Get a random groupe_id (assuming you have groupes in the database)
        $groupeId = \App\Models\Groupe::inRandomOrder()->first()->id;

        return [
            'date' => $date,

        ];
    }
}
