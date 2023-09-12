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

        // Connecter l'utilisateur
        Auth::login($user);

        // Rediriger l'utilisateur vers la page appropriée en fonction de son type de compte
        switch ($user->account_type) {
            case 'admin':
                return redirect()->route('admin.index')->with('success', 'Votre compte admin a été créé');
            case 'client':
                return redirect()->route('client.index')->with('success', 'Votre compte client a été créé');
            case 'employee':
                return redirect()->route('employee.index')->with('success', 'Votre compte employé a été créé');
            default:
                return redirect()->route('accueil')->with('success', 'Votre compte a été créé');
        }
    }
<<<<<<< HEAD
=======


>>>>>>> ee4903211b52abd2d280c2f2202275413e9c736c
}
