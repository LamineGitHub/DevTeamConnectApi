<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employer;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Random\RandomException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @throws RandomException
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

        //Service::factory(random_int(3, 4))->create();

        //Employer::factory(random_int(2, 4))->create();

        $services = Service::factory(random_int(3, 4))->create();

        $services->each(function ($service) {
            Employer::factory(random_int(2, 4))->for($service)->create();
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
