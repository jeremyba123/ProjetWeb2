<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EnregistrementController extends Controller
{
    /**
     * Affiche le formulaire d'enregistrement
     *
     * @return View
     */
    public function create()
    {
        return view('auth.enregistrement.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            "prenom" => "required",
            "nom" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "confirmation_password" => "required|same:password",
            "account_type" => "required|in:admin,client,employee"
        ], [
            "prenom.required" => "Le prénom est requis",
            "nom.required" => "Le nom est requis",
            "email.required" => "Le courriel est requis",
            "email.email" => "Le courriel doit avoir un format valide",
            "email.unique" => "Ce courriel ne peut pas être utilisé",
            "password.required" => "Le mot de passe est requis",
            "password.min" => "Mot de passe :min caractères minimum",
            "confirmation_password.required" => "Le champ est requis",
            "confirmation_password.same" => "Le mot de passe n'a pu être confirmé"
        ]);

        // Créer un nouvel utilisateur
        $user = new User();
        $user->prenom = $validated["prenom"];
        $user->nom = $validated["nom"];
        $user->email = $validated["email"];
        $user->password = Hash::make($validated["password"]);
        $user->account_type = $validated["account_type"]; // Enregistrez le type de compte

        $user->save();

        // Connecter l'utilisateur
        Auth::login($user);

        // Rediriger l'utilisateur vers la page appropriée en fonction de son type de compte
        switch ($user->account_type) {
            case 'admin':
                return redirect()->route('admin.dashboard')->with('success', 'Votre compte admin a été créé');
            case 'client':
                return redirect()->route('client.create')->with('success', 'Votre compte client a été créé');
            case 'employee':
                return redirect()->route('employee.dashboard')->with('success', 'Votre compte employé a été créé');
            default:
                return redirect()->route('accueil')->with('success', 'Votre compte a été créé');
        }
    }
}
