<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HorairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Horaire::factory(8)->create();
    }
}
