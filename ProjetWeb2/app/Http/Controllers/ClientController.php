<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Forfait;
use App\Models\Caracteristique;
use App\Models\ForfaitUser;

class ClientController extends Controller
{
    /**
     * Affiche la page de création de réservation.
     *
     * @return View
     */
    public function create()
    {
        // Récupère l'ID de l'utilisateur authentifié
        $userId = auth()->user()->id;

        return view('client.create', [
            "forfaits" => Forfait::all(),
            "caracteristiques" => Caracteristique::all(),
            "forfaits_client" => ForfaitUser::where('user_id', $userId)
                ->orderBy("date_darriver", "asc")
                ->get(),
        ]);
    }

    /**
     * Enregistre une nouvelle réservation dans la base de données.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $valides = $request->validate([
            "forfait_id" => "required",
            "date_darriver" => "required"
        ], [
            "date_darriver.required" => "La date est obligatoire",
            "forfait_id.required" => "Le forfait est obligatoire",
        ]);

        // Crée une nouvelle réservation
        $forfait_User = new ForfaitUser(); // $Forfait_User contient un objet "vide" du modèle (équivalent à une nouvelle entrée dans la table)
        $forfait_User->forfait_id = $valides["forfait_id"];
        $forfait_User->date_darriver = $valides["date_darriver"];
        $forfait_User->user_id = auth()->user()->id;
        $forfait_User->save();

        // Redirige l'utilisateur vers la page de création avec un message de succès
        return redirect()
            ->route('client.create')
            ->with('succes', "Réservation réussi!");
    }

    /**
     * Supprime une reservation de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recherche la réservation par son ID
        $reservation = ForfaitUser::find($id);
        if (!$reservation) {
            // Redirige en cas de réservation non trouvée avec un message d'erreur
            return redirect()->route('client.create')->with('error', 'Un problème est survenue!');
        }
        // Supprime la réservation de la base de données et redirige avec un message de confirmation

        $reservation->delete();
        return redirect()->route('client.create')->with('succes', 'Votre réservation à été supprimé avec succès.');
    }
}
