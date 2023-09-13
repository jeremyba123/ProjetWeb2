<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use \App\Models\User;


class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $roles = ['client', 'employee', 'admin'];

        $role = $this->faker->randomElement($roles);
        $forfaitId = $role === 'client' ? \App\Models\Forfait::inRandomOrder()->first()->id : null;

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'account_type' => $role,
            'forfait_id' => $forfaitId,
        ];
    }
}
