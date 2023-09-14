<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    /**
     * Affiche le formulaire de connexion
     *
     * @return View
     */
    public function create()
    {
        return view('auth.connexion.create');
    }

    public function authentifier(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ], [
            "email.required" => "Le courriel est obligatoire",
            "email.email" => "Le courriel doit avoir un format valide",
            "password.required" => "Le mot de passe est requis"
        ]);

        if (Auth::attempt($valides)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->account_type === 'admin') {
                return redirect()
                    ->intended(route('admin.index'))
                    ->with('succes', 'Vous êtes connecté en tant qu\'administrateur!');
            } elseif ($user->account_type === 'client') {
                return redirect()
                    ->intended(route('client.create'))
                    ->with('succes', 'Vous êtes connecté en tant que client!');
            } elseif ($user->account_type === 'employee') {
                return redirect()
                    ->intended(route('employee.index'))
                    ->with('succes', 'Vous êtes connecté en tant qu\'employé!');
            }
        }

        return back()
            ->withErrors([
                "email" => "Les informations fournies ne sont pas valides"
            ])
            ->onlyInput('email');
    }


    /**
     * Déconnecte l'utilisateur
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function deconnecter(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('accueil')
            ->with('succes', "Vous êtes déconnectés!");
    }
}
