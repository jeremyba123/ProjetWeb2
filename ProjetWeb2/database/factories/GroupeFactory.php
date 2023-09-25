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
            'Metallica', 'Slayer', 'Megadeth',
            'Pantera',  'Motorhead', 'Dio', 'Anthrax',
            'Tool', 'Opeth', 'Mastodon', 'Meshuggah',
            'Nightwish', 'Epica',   'Kreator',
             'Behemoth', 'Dimmu Borgir',
            'In Flames', 'Testament', 'Exodus', 'Sepultura', 'Gojira',
            'Sabaton',  'Amorphis', 'Kamelot',
             'Moonspell', 'Wintersun',  'Rammstein',
            'DevilDriver',   'Trivium',
        ];


        $imageFilenames = [
            'aiden-marples-Udu9NgiNFk8-unsplash.jpg',
            'antoine-j-tlVxYYPt9yg-unsplash.jpg',
            'austin-neill-hgO1wFPXl3I-unsplash.jpg',
            'danny-howe-gwQAhisLnRA-unsplash.jpg',
            'hannah-gibbs-X5TMNn2ivIE-unsplash.jpg',
            'jacek-dylag-hUHzaiAHuUc-unsplash.jpg',
            'jesse-ramirez-R1NBUvxIdu8-unsplash.jpg',
            'luis-reynoso-J5a0MRXVnUI-unsplash.jpg',
            'sam-moghadam-khamseh-TmbMLAvXrZQ-unsplash.jpg',
            'vidar-nordli-mathisen-iTOq8vZkVEY-unsplash.jpg',
            'vishnu-r-nair-kWCHq48Xwgw-unsplash.jpg',
            'william-white-NDGzkMIasJQ-unsplash.jpg',
            'zachary-nelson-HPYk8X9hh34-unsplash.jpg',
        ];

        return [
            'nom' => $this->faker->unique()->randomElement($metalNames),
            'ville' => $this->faker->city,
            'image_url' => 'storage/custom_images/' . $this->faker->randomElement($imageFilenames),

        ];
    }
}
