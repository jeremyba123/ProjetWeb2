<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horaire;

class HoraireController extends Controller
{
    /**
     * Affiche la liste complète des horaires depuis la base de données.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérez les horaires depuis la base de données
        $horaires = Horaire::all();

        // Passez les données à la vue 'horaire.blade.php'
        return view('horaire', compact('horaires')); // Utilisation de compact() pour passer la variable $horaires à la vue
    }
}
