<?php

namespace Database\Seeders;

use App\Models\Groupe;
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
        $groupes = Groupe::all();

        foreach ($groupes as $groupe) {

            \App\Models\Horaire::factory()->create([

                "groupe_id" => $groupe->id

            ]);
        }
    }
}
