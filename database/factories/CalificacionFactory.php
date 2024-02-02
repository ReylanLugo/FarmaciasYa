<?php

namespace Database\Factories;

use App\Models\Alumno;
use App\Models\Asignatura;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calificacion>
 */
class CalificacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "alumno_id" => Alumno::factory(),
            "asignatura_id"=> Asignatura::factory(),
            "calificacion" => $this->faker->numberBetween(0, 20),
        ];
    }
}
