<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class EmployerFactory extends Factory
{
    protected $model = Employer::class;

    public function definition(): array
    {
        return [
            'matricule' => Str::random(7),
            'prenom' => $this->faker->firstName(),
            'nom' => $this->faker->lastName(),
            'tel' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'salaire' => $this->faker->randomNumber(3, true),
            'service_id' => Service::factory(),
            'dateNaiss' => $this->faker->date(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
