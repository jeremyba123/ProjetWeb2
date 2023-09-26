<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Exécute les seeders pour alimenter la base de données de l'application.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CaracteristiqueSeeder::class);
        $this->call(ForfaitsTableSeeder::class);
        $this->call(GroupesTableSeeder::class);
        $this->call(HorairesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
