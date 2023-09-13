<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
     /**
     * Affiche la liste des notes de cours
     *
     * @return View
     */
    public function index()
    {
        return view('client.index', [
            "forfaits" => Forfait::all(),
            "caracteristiques" => Caracteristique::all()

        ]);
    }

    //     public function store(Request $request)
    //     {
    //         // Valider
    //         $valides = $request->validate([
    //             "forfait_id" => "required",
    //             "date_darriver" => "required"
    //         ], [
    //             "date_darriver.required" => "La date est obligatoire",
    //             "forfait_id.required" => "Le forfait est obligatoire",
    //         ]);

    //         // Ajouter à la BDD
    //         $forfait_User = new ForfaitUser; // $Forfait_User contient un objet "vide" du modèle (équivalent à une nouvelle entrée dans la table)
    //         $forfait_User->forfait_id = $valides["forfait_id"];
    //         $forfait_User->date_darriver = $valides["date_darriver"];
    //         $forfait_User->user_id = auth()->user()->id;
    //         $forfait_User->save();

    //         // Rediriger
    //         return redirect()
    //             ->route('client.create')
    //             ->with('succes', "Réservation réussi!");
    //     }
}
