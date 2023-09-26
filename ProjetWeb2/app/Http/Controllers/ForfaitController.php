<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use App\Models\Forfait;
use Illuminate\Http\Request;

class ForfaitController extends Controller
{
    /**
     * Affiche la vue principale des forfaits avec les données nécessaires.
     *
     * Cette fonction récupère tous les forfaits et caractéristiques depuis la base de données
     * et les transmet à la vue "forfaits" pour l'affichage.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view("forfaits", [
            "forfaits" => Forfait::all(),
            "caracteristiques" => Caracteristique::all()
        ]);
    }
}
