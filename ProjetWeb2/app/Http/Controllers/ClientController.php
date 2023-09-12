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
    public function index() {
        return view('client.index', [
            "forfaits" => auth()->user()->forfaits
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
