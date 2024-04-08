<?php

namespace Database\Seeders;

use App\Models\Prestataire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrestataireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Prestataire::factory(10)->create();
    }
}
