<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        $services = [
            'Développement Web',
            'Réseaux informatiques',
            'Assistance technique',
            'Sécurité informatique',
            'Gestion de bases de données',
            'Analyse de données',
            "Développement d'applications mobiles",
            'Cloud computing',
        ];

        return [
            'libelle' => $this->faker->unique()->randomElement($services),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
