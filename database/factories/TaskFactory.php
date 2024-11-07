<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(),
            'description' => fake()->sentence(10),
            'init_date' => fake()->date(),
            'finish_date' => fake()->date(),
            'user_id' => \App\Models\User::all()->random()->id,
            'status' => fake()->text()
        ];
    }
}
