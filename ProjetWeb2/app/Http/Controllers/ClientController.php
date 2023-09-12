<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use App\Models\Forfait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Affiche la liste des notes de cours
     *
     * @return View
     */
    public function create()
    {
        return view('client.create', [
            "forfaits" => Forfait::all(),
            "caracteristiques" => Caracteristique::all()

        ]);
    }

    public function store(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "forfait_id" => "required",
            "date" => "required"
        ], [
            "date.required" => "La date est obligatoire",
            "forfait_id.required" => "Le forfait est obligatoire",

        ]);
    }





    // use App\Models\ForfaitUser;

 // public function store(Request $request)
 //{
    // Validez les données du formulaire ici

    // Récupérez l'utilisateur connecté (vous pouvez utiliser l'authentification Laravel)
    // $user = auth()->user();

    // Récupérez les données du formulaire
   // $forfaitId = $request->input('forfait');
   // $dateDepart = $request->input('date_depart');

    // Enregistrez la réservation dans la table pivot
  //  $user->forfaits()->attach($forfaitId, ['date_depart' => $dateDepart]);

    // Redirigez l'utilisateur vers une page de confirmation ou de remerciement
//}

}
