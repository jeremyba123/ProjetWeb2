<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Groupe;


class GroupeFactory extends Factory
{
    protected $model = Groupe::class;

    /**
     * Définit les attributs par défaut pour une instance de modèle Groupe.
     *
     * @return array
     */
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
            'antonio-janeski-Cq5g8WSxSG0-unsplash.jpg',
            'chanteur-guitariste-scene.jpg',
            'concert-1748102_1920.jpg',
            'divya-agrawal-Q2BGbiLNwDc-unsplash.jpg',
            'foule-liesse-s-amusant-au-festival-musique-dans-boite-nuit.jpg',
            'glenn-van-de-wiel-DWHSc8o8K9Y-unsplash.jpg',
            'julian-lozano-FMZxjmeZ95o-unsplash.jpg',
            'kovid-rathee-bnzstUqRKnM-unsplash.jpg',
            'man-6507758_1280.jpg',
            'matthew-kalapuch-sqJ4tLBiurw-unsplash.jpg',
            'music-5174230_1920.jpg',
            'nicholas-green-rAsESO5Puqw-unsplash.jpg',
            'pexels-andy-pinaria-10518430.jpg',
            'pexels-connor-gardenhire-2466341.jpg',
            'pexels-harrison-haines-3536236.jpg',
            'pexels-johannes-havn-2417726.jpg',
            'pexels-johannes-havn-2417730.jpg',
            'pexels-pixabay-164693.jpg',
            'pexels-pixabay-164758.jpg',
            'pexels-thibault-trillet-167636.jpg',
            'sam-moghadam-khamseh-5GEEKG5nOpA-unsplash.jpg',
            'singer-5989931_1920.jpg',
            'tim-toomey-N__2iP37Z04-unsplash.jpg',
            'yohann-libot-iFjNvPQ_4Z4-unsplash.jpg',
            'yohann-libot-UqEF_gZVddk-unsplash.jpg',
            'yuan-thirdy-rJrgTvtHrDM-unsplash.jpg',
        ];

        return [
            'nom' => $this->faker->unique()->randomElement($metalNames),
            'ville' => $this->faker->city,
            'image_url' => 'storage/custom_images/' . $this->faker->unique()->randomElement($imageFilenames),

        ];
    }
}
