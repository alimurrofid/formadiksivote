<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Hope;
use App\Models\VoteSession;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CandidateSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        VoteSession::create([
            'session_run' => 0,
        ]);
        $this->call([
            CandidateSeeder::class,
            UserSeeder::class,
        ]);
        Hope::factory()->count(20)->create();
    }
}
