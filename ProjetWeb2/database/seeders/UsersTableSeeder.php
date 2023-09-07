<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::factory(10)->create(); // Create 10 dummy users with associated forfaits for clients
    }
}
