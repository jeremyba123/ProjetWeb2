<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
