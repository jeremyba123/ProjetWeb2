<?php

namespace Database\Seeders;

use App\Models\Caracteristique;
use App\Models\Forfait;
use Illuminate\Database\Seeder;

class ForfaitsTableSeeder extends Seeder
{
    /**
     * Exécute les opérations de remplissage de la base de données pour les forfaits.
     *
     * @return void
     */
    public function run()
    {
        // Crée trois forfaits en utilisant la factory Forfait.
        \App\Models\Forfait::factory(3)->create();

        // Associe le forfait 1 à la caractéristique "Admission".
        $forfait = Forfait::find(1);
        $caracteristique = Caracteristique::where('nom', '=', 'Admission')->first();
        $forfait->caracteristiques()->attach($caracteristique);

        // Associe le forfait 2 à plusieurs caractéristiques.
        $forfait = Forfait::find(2);
        $caracteristique1 = Caracteristique::where('nom', '=', 'Admission')->first();
        $caracteristique2 = Caracteristique::where('nom', '=', 'Consommation')->first();
        $caracteristique3 = Caracteristique::where('nom', '=', 'Logement')->first();

        $forfait->caracteristiques()->attach($caracteristique1);
        $forfait->caracteristiques()->attach($caracteristique2);
        $forfait->caracteristiques()->attach($caracteristique3);

        // Associe le forfait 3 à plusieurs caractéristiques, y compris "Accès VIP" et "Repas complet".
        $forfait = Forfait::find(3);
        $caracteristique1 = Caracteristique::where('nom', '=', 'Admission')->first();
        $caracteristique2 = Caracteristique::where('nom', '=', 'Consommation')->first();
        $caracteristique3 = Caracteristique::where('nom', '=', 'Logement')->first();
        $caracteristique4 = Caracteristique::where('nom', '=', 'Accès VIP')->first();
        $caracteristique5 = Caracteristique::where('nom', '=', 'Repas complet')->first();

        $forfait->caracteristiques()->attach($caracteristique1);
        $forfait->caracteristiques()->attach($caracteristique2);
        $forfait->caracteristiques()->attach($caracteristique3);
        $forfait->caracteristiques()->attach($caracteristique4);
        $forfait->caracteristiques()->attach($caracteristique5);
    }
}
