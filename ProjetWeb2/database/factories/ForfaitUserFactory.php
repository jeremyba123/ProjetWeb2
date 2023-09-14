<?php

namespace Database\Factories;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ForfaitUser;

class ForfaitUserTableSeeder extends Seeder
{
    public function run()
    {
        $clients = User::where('account_type', 'client')->get();

        foreach ($clients as $client) {
            // Créez une relation pivot pour chaque utilisateur client avec un forfait aléatoire.
            ForfaitUser::factory()->create([
                'user_id' => $client->id,
                'forfait_id' => \App\Models\Forfait::factory(),
                'date_darriver' => now(),
            ]);
        }
    }
}

