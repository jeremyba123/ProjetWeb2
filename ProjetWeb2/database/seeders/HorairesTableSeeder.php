<?php

namespace Database\Seeders;

use App\Models\Groupe;
use Illuminate\Database\Seeder;

class HorairesTableSeeder extends Seeder

{
    /**
     * Exécute le remplissage de la base de données avec des horaires.
     *
     * @return void
     */
    public function run()
    {
        // Récupère tous les groupes de la base de données.
        $groupes = Groupe::all();

        // Crée des horaires pour chaque groupe.
        foreach ($groupes as $groupe) {
            \App\Models\Horaire::factory()->create([
                "groupe_id" => $groupe->id
            ]);
        }
    }
}
