<?php

namespace Database\Factories;

use App\Models\Admin; // Ajout de l'import du modèle Admin
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // Import de la classe Str pour générer des mots de passe aléatoires

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name, // Utilisation de $this->faker au lieu de $faker
            'email' => $this->faker->unique()->safeEmail, // Utilisation de $this->faker au lieu de $faker
            'password' => bcrypt(Str::random(10)), // Utilisation de Str::random pour générer un mot de passe aléatoire
        ];
    }
}
