<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use \App\Models\User;


class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Définit les attributs par défaut pour la création d'une instance de modèle User.
     *
     * @return array
     */
    public function definition()
    {
        // Liste des rôles possibles pour un utilisateur.
        $roles = ['client', 'employee', 'admin'];

        // Sélectionne aléatoirement un rôle parmi la liste.
        $role = $this->faker->randomElement($roles);


        return [
            // Génère un nom aléatoire.
            'nom' => $this->faker->name(),

            // Génère un prénom aléatoire.
            'prenom' => $this->faker->name(),

            // Génère une adresse email unique et sécurisée.
            'email' => $this->faker->unique()->safeEmail(),

            // Définit un mot de passe hashé factice pour les utilisateurs (à remplacer en production).
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

            // Génère un token de rappel aléatoire.
            'remember_token' => Str::random(10),

            // Attribue le rôle sélectionné à l'utilisateur.
            'account_type' => $role,
        ];
    }
}
