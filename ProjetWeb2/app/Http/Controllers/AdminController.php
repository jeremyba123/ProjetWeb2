<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
     /**
     * Affiche la liste des notes de cours
     *
     * @return View
     */
    public function index() {
        return view('admin.index', [
            "clients" => User::where('account_type', 'client')->get(),
            "employes" => User::where('account_type', 'employee')->get(),
            "admins" => User::where('account_type', 'admin')->get()
        ]);
    }


     /**
     * Affiche le formulaire d'enregistrement
     *
     * @return View
     */
    public function create() {
        return view('admin.create');
    }

    /**
     * Affiche le formulaire d'enregistrement
     *
     * @return View
     */
    public function ajout() {
        return view('admin.ajout');
    }


    public function store(Request $request) {
        // Valider les données du formulaire
        $validated = $request->validate([
            "nom" => "required", // Modifiez "name" en "nom"
            "prenom" => "required", // Ajoutez "prenom" pour stocker le prénom
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "confirmation_password" => "required|same:password",
            "account_type" => "required|in:admin,client,employee",
        ], [
            // Messages de validation personnalisés
        ]);

        // Créer un nouvel utilisateur
        $user = new User();
        $user->nom = $validated["nom"];
        $user->prenom = $validated["prenom"];
        $user->email = $validated["email"];
        $user->password = Hash::make($validated["password"]);
        $user->account_type = $validated["account_type"];


        $user->save();


        return redirect()->route('admin.index')->with('success', 'Le compte a été créé');


}


 /**
     * Supprime un utilisateur de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.index')->with('error', 'Utilisateur non trouvé.');
        }

        // Supprime l'utilisateur de la base de données
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'L\'utilisateur a été supprimé avec succès.');
    }


    public function edit($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('admin.index')->with('error', 'Utilisateur non trouvé.');
    }

    return view('admin.edit', compact('user'));
}


public function update(Request $request, $id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('admin.index')->with('error', 'Utilisateur non trouvé.');
    }

    $validated = $request->validate([
        "nom" => "required",
        "prenom" => "required",
        "email" => "required|email|unique:users,email," . $user->id,
        "account_type" => "required|in:admin,client,employee",
    ]);

    $user->nom = $validated["nom"];
    $user->prenom = $validated["prenom"];
    $user->email = $validated["email"];
    $user->account_type = $validated["account_type"];

    $user->save();

    return redirect()->route('admin.index')->with('success', 'L\'utilisateur a été mis à jour avec succès.');
}

}
