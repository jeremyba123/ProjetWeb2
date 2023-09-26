<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupesTableSeeder extends Seeder
{
    /**
     * Exécute les opérations de remplissage de la table 'groupes'.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Groupe::factory(16)->create();
    }
}
