<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre" => $this->faker->firstName,
            "apellido" => $this->faker->lastName,
            "cedula" => $this->faker->unique()->numerify('V#########'),
            'nacimiento' => $this->faker->date(),
            'edad' => $this->faker->numberBetween(18, 40),
        ];
    }
}