<?php

namespace Database\Seeders;

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
    }
}
