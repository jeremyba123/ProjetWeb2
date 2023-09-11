<?php

namespace Database\Seeders;

use App\Models\Caracteristique;
use Illuminate\Database\Seeder;

class CaracteristiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $noms = ["Admission", "Consommation", "logement", "Accès VIP", "Repas complet"];

        foreach ($noms as $nom) {
            Caracteristique::factory()->create([
                "nom" => $nom,
            ]);
        }
    }
}
