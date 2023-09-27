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

          // Create the first Forfait with specific attributes
          Forfait::factory(1)->create([
            'nom' => 'Forfait 1',
            'prix' => 100, // Set your desired price
            'jour' => 2,   // Set your desired number of days
        ]);

        // Create the second Forfait with specific attributes
        Forfait::factory(1)->create([
            'nom' => 'Forfait 2',
            'prix' => 150, // Set your desired price
            'jour' => 5,   // Set your desired number of days
        ]);

        // Create the third Forfait with specific attributes
        Forfait::factory(1)->create([
            'nom' => 'Forfait 3',
            'prix' => 200, // Set your desired price
            'jour' => 10,  // Set your desired number of days
        ]);


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
