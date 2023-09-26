<?php

namespace Database\Seeders;

use App\Models\Caracteristique;
use Illuminate\Database\Seeder;

class CaracteristiqueSeeder extends Seeder
{
    /**
     * Exécute les opérations de remplissage de la base de données.
     *
     * @return void
     */
    public function run()
    {
        // Liste des noms de caractéristiques à insérer dans la base de données.
        $noms = ["Admission", "Consommation", "logement", "Accès VIP", "Repas complet"];

        // Crée des enregistrements de caractéristiques en utilisant une usine (factory) et les noms fournis.
        foreach ($noms as $nom) {
            Caracteristique::factory()->create([
                "nom" => $nom,
            ]);
        }
    }
}
