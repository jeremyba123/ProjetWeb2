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
     * Affiche la liste des notes de cours
     *
     * @return View
     */
    public function create()
    {
        $userId = auth()->user()->id;

        return view('client.create', [
            "forfaits" => Forfait::all(),
            "caracteristiques" => Caracteristique::all(),
            "forfaits_client" => ForfaitUser::where('user_id', $userId)
                ->orderBy("date_darriver", "asc")
                ->get(),
        ]);
    }

    public function store(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "forfait_id" => "required",
            "date_darriver" => "required"
        ], [
            "date_darriver.required" => "La date est obligatoire",
            "forfait_id.required" => "Le forfait est obligatoire",
        ]);

        // Ajouter à la BDD
        $forfait_User = new ForfaitUser(); // $Forfait_User contient un objet "vide" du modèle (équivalent à une nouvelle entrée dans la table)
        $forfait_User->forfait_id = $valides["forfait_id"];
        $forfait_User->date_darriver = $valides["date_darriver"];
        $forfait_User->user_id = auth()->user()->id;
        $forfait_User->save();

        // Rediriger
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
        $reservation = ForfaitUser::find($id);
        if (!$reservation) {
            return redirect()->route('client.create')->with('error', 'Un problème est survenue!');
        }
        // Supprime la reservation de la base de données et redirige avec message de confirmation

        $reservation->delete();
        return redirect()->route('client.create')->with('success', 'Votre réservation à été supprimé avec succès.');
    }
}
