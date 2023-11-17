<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'voting_number' => $this->faker->numberBetween(1, 3),
            'name' => $this->faker->name(),
            'photo' => $this->faker->imageUrl(),
            'major' => $this->faker->randomElement(['Teknologi Informasi', 'Teknik Elektronika', 'Teknik Mesin']),
            'department' => $this->faker->randomElement(['Teknik Informatika', 'Teknik Elektronika Industri', 'Teknik Mesin Produksi']),
            'vision' => $this->faker->paragraph(),
            'vote_count' => $this->faker->numberBetween(0, 100)
        ];
    }
}
