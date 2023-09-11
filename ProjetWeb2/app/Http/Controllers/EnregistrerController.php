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
    public function create() {
        return view('auth.enregistrement.create');
    }

    public function store(Request $request) {
        // Valider les données du formulaire
        $validated = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "avatar" => "nullable|mimes:png,jpg,jpeg",
            "confirmation_password" => "required|same:password",
            "account_type" => "required|in:admin,client,employee", // Ajoutez cette validation
        ], [
            // Messages de validation personnalisés
        ]);

        // Créer un nouvel utilisateur
        $user = new User();
        $user->name = $validated["name"];
        $user->email = $validated["email"];
        $user->password = Hash::make($validated["password"]);
        $user->account_type = $validated["account_type"]; // Enregistrez le type de compte

        // Traiter le téléversement de l'avatar
        if ($request->hasFile('avatar')) {
            // Déplacer l'avatar vers le stockage
            $path = $request->file('avatar')->store('public/uploads');
            // Sauvegarder le chemin dans la base de données
            $user->avatar = Storage::url($path);
        }

        $user->save();

        // Connecter l'utilisateur
        Auth::login($user);

        // Rediriger l'utilisateur vers la page appropriée en fonction de son type de compte
        switch ($user->account_type) {
            case 'admin':
                return redirect()->route('admin.dashboard')->with('success', 'Votre compte admin a été créé');
            case 'client':
                return redirect()->route('client.index')->with('success', 'Votre compte client a été créé');
            case 'employee':
                return redirect()->route('employee.dashboard')->with('success', 'Votre compte employé a été créé');
            default:
                return redirect()->route('accueil')->with('success', 'Votre compte a été créé');
        }
    }

}

