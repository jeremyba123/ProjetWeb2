<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Groupe;
use App\Models\Forfait;
use App\Models\ForfaitUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Affiche la liste des notes de cours
     *
     * @return View
     */
    public function index()
    {
        return view('admin.index', [
            "clients" => User::where('account_type', 'client')->get(),
            "employes" => User::where('account_type', 'employee')->get(),
            "admins" => User::where('account_type', 'admin')->get(),
            "admin" => Auth::user(),
        ]);
    }


    /**
     * Affiche le formulaire d'enregistrement
     *
     * @return View
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Affiche le formulaire d'enregistrement
     *
     * @return View
     */
    public function ajout()
    {
        return view('admin.ajout');
    }



    /**
     * Affiche le formulaire d'enregistrement
     *
     * @return view
     */
    public function forfait()
    {
        $forfaitsAvecUtilisateurs = Forfait::with('users')->get();

        return view('admin.forfait', [
            "forfaits" => $forfaitsAvecUtilisateurs,
            "admin" => Auth::user(),
        ]);
    }



    /**
     * Affiche le formulaire de modification dun groupe
     *
     * @return view
     */
    public function groupe()
    {
        return view('admin.groupe', [
            "groupes" => Groupe::all(),
            "admin" => Auth::user(),
        ]);
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
        $admin = Auth::user();
        if (!$user) {
            return redirect()->route('admin.index')->with('error', 'Utilisateur non trouvé.');
        }

        return view('admin.edit', compact('user', 'admin'));
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






    public function editGroupe($id)
    {
        $groupe = Groupe::find($id);
        $admin = Auth::user();

        if (!$groupe) {
            return redirect()->route('admin.groupe')->with('error', 'Groupe non trouvé.');
        }

        return view('admin.editGroupe', compact('groupe', 'admin'));
    }


    public function updateGroupe(Request $request, $id)
    {
        $groupe = Groupe::find($id);

        if (!$groupe) {
            return redirect()->route('admin.groupe')->with('error', 'Groupe non trouvé.');
        }

        $validated = $request->validate([
            "nom" => "required",
            "ville" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif|max:2048", // Assurez-vous de configurer la validation d'image selon vos besoins.
        ]);

        $groupe->nom = $validated["nom"];
        $groupe->ville = $validated["ville"];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('groupe_images'); // Assurez-vous d'avoir configuré le stockage de fichiers correctement.
            $groupe->image = $imagePath;
        }

        $groupe->save();

        return redirect()->route('admin.groupe')->with('success', 'Le groupe a été mis à jour avec succès.');
    }


    public function destroyForfaitUser($forfait_id, $user_id)
    {
        // Trouvez l'enregistrement de la table pivot correspondant
        $forfaitUser = ForfaitUser::where('forfait_id', $forfait_id)
            ->where('user_id', $user_id)
            ->first();

        if ($forfaitUser) {
            // Supprimez l'enregistrement de la table pivot
            $forfaitUser->delete();
        }

        // Redirigez l'utilisateur vers la page appropriée
        return redirect()->back();
    }
}
