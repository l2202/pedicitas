<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nombre' => 'Test User',
            'email' => 'test@example.com',
            'appa' => 'Perez',
            'apma' => 'Lopez',
            'sexo' => 'Masculino',
            'cumple' => '2000-01-01',
            'rol' => 'padre',
        ]);
        $this->call([
            PacienteSeeder::class,
        ]);
    }
}
