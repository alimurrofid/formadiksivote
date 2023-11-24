<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Candidate::factory()->count(3)->create();
        Candidate::create([
            'voting_number' => 1,
            'name' => 'Aufa Ahnaf',
            'photo' => 'https://i.ibb.co/0jZGZJd/1.jpg',
            'major' => 'Teknologi Informasi',
            'department' => 'Teknik Informatika',
            'vision' => 'Lorem ipsum dolor sit amet'
            ]);
        Candidate::create([
            'voting_number' => 2,
            'name' => 'Muhammad Fauzan',
            'photo' => 'https://i.ibb.co/0jZGZJd/1.jpg',
            'major' => 'Teknologi Kimia',
            'department' => 'Teknik Kimia Industri',
            'vision' => 'Lorem ipsum dolor sit amet'
            ]);
        Candidate::create([
            'voting_number' => 3,
            'name' => 'Achmad Fauzi',
            'photo' => 'https://i.ibb.co/0jZGZJd/1.jpg',
            'major' => 'Teknologi Sipil',
            'department' => 'Manajemen Rekayasa Konstruksi',
            'vision' => 'Lorem ipsum dolor sit amet'
            ]);
    }
}
