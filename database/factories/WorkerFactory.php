<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->userName,
            'surname' => fake()->lastName,
            "email" => fake()->unique()->safeEmail(),
            "age" => fake()->numberBetween(20, 70),
            "description" => fake()->text(250),
            "position_id" => Position::inRandomOrder()->first()->id
        ];
    }
}
