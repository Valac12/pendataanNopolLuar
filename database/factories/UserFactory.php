<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'username' => fake()->firstName(),
            'password' => bcrypt('admin123'), // password
            'level' => 1,
            'nama_level' => 'Administrator',
            'online_offline' => 'Offline',
            'tgl_login' => '2023-08-15 18:37:53',
            'tgl_logout' => '2023-08-15 01:11:56',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
