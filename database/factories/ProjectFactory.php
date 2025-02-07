<?php

namespace Database\Factories;

use App\Enums\ProjectStatus; // Ensure this class exists in the App\Enums namespace
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Client;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id');
        $clients = Client::pluck('id');

        return [
            'title'         => $this->faker->sentence(3),
            'description'   => $this->faker->paragraph(),
            'deadline_at'   => now()->addDays(rand(1, 30))->format('Y-m-d'),
            'status'        => $this->faker->randomElement(ProjectStatus::cases())->value,
            'user_id'       => $users->random(),
            'client_id'     => $clients->random(),
        ];
    }
}