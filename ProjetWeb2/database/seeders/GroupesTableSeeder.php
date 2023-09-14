<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Groupe::factory(16)->create();
    }
}
