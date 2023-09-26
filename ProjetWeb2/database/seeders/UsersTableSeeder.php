<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Exécute le seeder pour créer des utilisateurs fictifs.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create(); // Crée 10 utilisateurs fictifs avec des forfaits associés pour les clients
    }
}
