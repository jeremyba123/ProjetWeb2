<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;


class GroupeController extends Controller
{
    /**
     * Affiche la vue principale pour les groupes.
     *
     * Cette fonction récupère tous les groupes depuis la base de données
     * et les passe à la vue "groupes".
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view("groupes", [

            "groupes" => Groupe::all(),

        ]);
    }
}
