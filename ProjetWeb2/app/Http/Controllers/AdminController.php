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
     * Affiche la page d'accueil de l'administration avec des statistiques.
     *
     * @return View
     */
    public function index()
    {
        // Récupère les statistiques et affiche la page d'accueil.
        return view('admin.index', [
            "clients" => User::where('account_type', 'client')->get(),
            "employes" => User::where('account_type', 'employee')->get(),
            "admins" => User::where('account_type', 'admin')->get(),
            "admin" => Auth::user(),
        ]);
    }


    /**
     * Affiche le formulaire de création d'utilisateur.
     *
     * @return View
     */
    public function create()
    {
        // Affiche le formulaire de création d'utilisateur.
        return view('admin.create');
    }

    /**
     * Affiche le formulaire d'ajout d'utilisateur.
     *
     * @return View
     */
    public function ajout()
    {
        // Affiche le formulaire d'ajout d'utilisateur.
        return view('admin.ajout');
    }



    /**
     * Affiche la liste des forfaits avec leurs utilisateurs.
     *
     * @return view
     */
    public function forfait()
    {
        // Récupère les forfaits avec les utilisateurs associés et affiche la liste.

        $forfaitsAvecUtilisateurs = Forfait::with('users')->get();

        return view('admin.forfait', [
            "forfaits" => $forfaitsAvecUtilisateurs,
            "admin" => Auth::user(),
        ]);
    }



    /**
     * Affiche la liste des groupes.
     *
     * @return view
     */
    public function groupe()
    {
        // Récupère la liste des groupes et affiche la page.
        return view('admin.groupe', [
            "groupes" => Groupe::all(),
            "admin" => Auth::user(),
        ]);
    }

    /**
     * Stocke les informations d'un nouvel utilisateur dans la base de données.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire et crée un nouvel utilisateur.
        // Redirige ensuite vers la page d'accueil de l'administration.
        // Gère également les erreurs de validation.
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


        return redirect()->route('admin.index')->with('succes', 'Le compte a été ajouter');
    }


    /**
     * Supprime un utilisateur de la base de données.
     *
     * @param  int  $id
     * @return Redirect
     */
    public function destroy($id)
    {
        // Recherche et supprime un utilisateur par ID.
        // Redirige ensuite vers la page d'accueil de l'administration.
        // Gère les cas où l'utilisateur n'est pas trouvé.
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.index')->with('erreur', 'Utilisateur non trouvé.');
        }

        // Supprime l'utilisateur de la base de données
        $user->delete();

        return redirect()->route('admin.index')->with('succes', 'L\'utilisateur a été supprimé avec succès.');
    }

    /**
     * Affiche le formulaire d'édition d'utilisateur.
     *
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        // Affiche le formulaire d'édition d'utilisateur pour l'ID spécifié.
        // Gère les cas où l'utilisateur n'est pas trouvé.
        $user = User::find($id);
        $admin = Auth::user();
        if (!$user) {
            return redirect()->route('admin.index')->with('erreur', 'Utilisateur non trouvé.');
        }

        return view('admin.edit', compact('user', 'admin'));
    }

    /**
     * Met à jour les informations d'un utilisateur dans la base de données.
     *
     * @param Request $request
     * @param int $id
     * @return Redirect
     */
    public function update(Request $request, $id)
    {
        // Valide les données du formulaire et met à jour l'utilisateur par ID.
        // Redirige ensuite vers la page d'accueil de l'administration.
        // Gère les cas où l'utilisateur n'est pas trouvé.
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.index')->with('erreur', 'Utilisateur non trouvé.');
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

        return redirect()->route('admin.index')->with('succes', 'L\'utilisateur a été mis à jour avec succès.');
    }

    /**
     * Affiche le formulaire d'édition de groupe.
     *
     * @param int $id
     * @return View
     */
    public function editGroupe($id)
    {
        // Affiche le formulaire d'édition de groupe pour l'ID spécifié.
        // Gère les cas où le groupe n'est pas trouvé.
        $groupe = Groupe::find($id);
        $admin = Auth::user();

        if (!$groupe) {
            return redirect()->route('admin.groupe')->with('erreur', 'Groupe non trouvé.');
        }

        return view('admin.editGroupe', compact('groupe', 'admin'));
    }

    /**
     * Met à jour les informations d'un groupe dans la base de données.
     *
     * @param Request $request
     * @param int $id
     * @return Redirect
     */
    public function updateGroupe(Request $request, $id)

    {

        // Valide les données du formulaire et met à jour le groupe par ID.

        // Redirige ensuite vers la liste des groupes.

        // Gère les cas où le groupe n'est pas trouvé.

        $groupe = Groupe::find($id);
        if (!$groupe) {

            return redirect()->route('admin.groupe')->with('succes', 'Groupe non trouvé.');
        }
        $validated = $request->validate([

            "nom" => "required",

            "ville" => "required",

            "image" => "nullable|mimes:jpeg,png,jpg,gif", // Assurez-vous de configurer la validation d'image selon vos besoins.

        ]);

        $groupe->nom = $validated["nom"];

        $groupe->ville = $validated["ville"];

        // Traiter le téléversement

        if ($request->hasFile('image')) {

            // Déplacer

            Storage::putFile("public/uploads", $request->image);

            // Sauvegarder le "bon" chemin qui sera inséré dans la BDD et utilisé par le navigateur

            $groupe->image_url = "/storage/uploads/" . $request->image->hashName();
        }

        $groupe->save();

        return redirect()->route('admin.groupe')->with('succes', 'Le groupe a été mis à jour avec succès.');
    }

    /**
     * Supprime l'association d'un utilisateur à un forfait.
     *
     * @param int $forfait_id
     * @param int $user_id
     * @return Redirect
     */
    public function destroyForfaitUser($forfait_id, $user_id)
    {
        // Recherche et supprime l'association entre un utilisateur et un forfait.
        // Redirige ensuite vers la page précédente.
        $forfaitUser = ForfaitUser::where('forfait_id', $forfait_id)
            ->where('user_id', $user_id)
            ->first();

        if ($forfaitUser) {
            // Supprimez l'enregistrement de la table pivot
            $forfaitUser->delete();
        }

        // Redirigez l'utilisateur vers la page appropriée
        return redirect()->back()->with('succes', 'La reservation a été enlever!');
    }
}
