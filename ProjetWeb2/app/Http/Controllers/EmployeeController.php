<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forfait;
use Illuminate\Support\Facades\Auth;
use App\Models\ForfaitUser;



class EmployeeController extends Controller
{
    /**
     * Affiche la page d'accueil de l'employé avec la liste des forfaits et des utilisateurs associés.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        // Récupère tous les forfaits avec leurs utilisateurs associés
        $forfaitsAvecUtilisateurs = Forfait::with('users')->get();

        return view('employee.index', [
            "forfaits" => $forfaitsAvecUtilisateurs,
            "admin" => Auth::user(),
            "forfaits_client" => ForfaitUser::all()
        ]);
    }
}
