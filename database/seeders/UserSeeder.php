<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'username' => 'test',
            'password' => bcrypt('test'),
            'role' => 1,
        ]);
        User::create([
            'name' => 'Test User 2',
            'username' => 'user',
            'password' => bcrypt('user'),
            'role' => 0,
        ]);
        User::factory()->count(10)->create();
    }
}
