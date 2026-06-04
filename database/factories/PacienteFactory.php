<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends Factory<Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'nombre' => fake()->firstName(),
            'appa' => fake()->lastName(),
            'apma' => fake()->lastName(),
            'fecha_nacimiento' => fake()->dateTimeBetween('-5 years', '-1 year'),
            'sexo' => fake()->randomElement(['Masculino', 'Femenino']),
            'alergias' => fake()->sentence(),
        ];
    }
}
