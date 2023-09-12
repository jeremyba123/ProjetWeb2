<?php

namespace Database\Seeders;

use App\Models\Caracteristique;
use App\Models\Forfait;
use Illuminate\Database\Seeder;

class ForfaitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Forfait::factory(3)->create();

        # prendre le forfait 1 et l'associer à la caractéristique "Admission"
        $forfait = Forfait::find(1);
        $caracteristique = Caracteristique::where('nom', '=', 'Admission')->first();

        $forfait->caracteristiques()->attach($caracteristique);

        # prendre le forfait 2 et l'associer à la caractéristique "Admission", "Consommation", "Logement"
        $forfait = Forfait::find(2);
        $caracteristique1 = Caracteristique::where('nom', '=', 'Admission')->first();
        $caracteristique2 = Caracteristique::where('nom', '=', 'Consommation')->first();
        $caracteristique3 = Caracteristique::where('nom', '=', 'Logement')->first();

        $forfait->caracteristiques()->attach($caracteristique1);
        $forfait->caracteristiques()->attach($caracteristique2);
        $forfait->caracteristiques()->attach($caracteristique3);

        # prendre le forfait 3 et l'associer à la caractéristique "Admission", "Consommation", "Logement , Accès VIP , Repas complet"
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
