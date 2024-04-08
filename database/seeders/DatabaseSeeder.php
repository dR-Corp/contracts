<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contrat;
use App\Models\Paiement;
use App\Models\Prestataire;
use App\Models\Role;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // Role::create([
        //     "code" => "ADMIN",
        //     "nom" => "Administrateur"
        // ]);
        // Role::create([
        //     "code" => "PRESTATEUR",
        //     "nom" => "Prestateur"
        // ]);
        
        // User::factory()->create([
        //     'nom' => 'Test',
        //     'prenom' => 'User',
        //     'telephone' => '123456789',
        //     'email' => 'test@example.com',
        //     'email_verified_at' => now(), // Assuming email is verified now
        //     'password' => bcrypt('password'), // Assuming default password is 'password'
        //     'role_id' => 1, // Assuming role ID is 1
        // ]);

        User::factory(10)->create();
        // Prestataire::factory(10)->create();
        // Contrat::factory(10)->create();
        // Tache::factory(10)->create();
        // Paiement::factory(10)->create();

    }
}
