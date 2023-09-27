<?php

namespace Database\Seeders;

use App\Models\ForfaitUser;
use App\Models\User;
use App\Models\Forfait;
use Illuminate\Database\Seeder;

class ForfaitUserTableSeeder extends Seeder
{
    /**
     * Exécute le remplissage de la table ForfaitUser avec des données de test.
     *
     * @return void
     */
    public function run()
    {
        // Récupère tous les utilisateurs de type "client" de la base de données.
        $clients = User::where('account_type', 'client')->get();

        // Boucle à travers les utilisateurs clients et crée une relation pivot avec un forfait aléatoire.
        foreach ($clients as $client) {
            // Créez une relation pivot pour chaque utilisateur client with a random forfait.
            ForfaitUser::factory()->create([
                'user_id' => $client->id,
                'forfait_id' => Forfait::inRandomOrder()->first()->id,
                'date_darriver' => now(),
            ]);
        }
    }
}
