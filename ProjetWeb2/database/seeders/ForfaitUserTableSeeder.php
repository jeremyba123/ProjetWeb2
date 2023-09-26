<?php

namespace Database\Seeders;

use App\Models\ForfaitUser;
use Illuminate\Database\Seeder;

class ForfaitUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ForfaitUser::factory(20)->create(); // Crée 20 relations aléatoires entre utilisateurs et forfaits.
    }
}
