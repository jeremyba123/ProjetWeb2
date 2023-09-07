<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Groupe;
class GroupeFactory extends Factory
{
    protected $model = Groupe::class;

    public function definition()
    {
        $metalNames = [
            'Metallica', 'Iron Maiden', 'Black Sabbath', 'Slayer', 'Megadeth',
            'Pantera', 'Judas Priest', 'Motorhead', 'Dio', 'Anthrax',
            'Tool', 'Opeth', 'Mastodon', 'Meshuggah', 'Lamb of God',
            'Nightwish', 'Epica', 'Arch Enemy', 'Within Temptation', 'Kreator',
        ];

        return [
            'nom' => $this->faker->unique()->randomElement($metalNames),
            'ville' => $this->faker->city,
            'image_url' => $this->faker->imageUrl(640, 480, 'music'), // Generate a random music-related image URL
        ];
    }
}
