<?php

namespace App\Http\Controllers;


use App\Models\Groupe;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    /**
     * Affiche la page d'accueil.
     *
     * Cette fonction renvoie la vue "index" avec une liste de groupes limitée à 8.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index', [
            "groupes" => Groupe::limit(8)->get()
        ]);
    }
}
