<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardHomeController extends Controller
{
    public function index()
    {
        //menampilkan jumlah candidate, user, user yang sudah vote, user yang belum vote
        $candidates = Candidate::all();
        $candidate_count = $candidates->count();
        $user_count = User::all()->count();
        $user_voted = User::where('is_voted', true)->count();
        $user_not_voted = User::where('is_voted', false)->count();

        //menampilkan jumlah vote setiap candidate
        $vote_count = [];
        $name = [];
        foreach ($candidates as $candidate) {
            $vote_count[] = $candidate->vote_count;
            $name[] = $candidate->name;
        }
        return view('dashboard.home', compact('candidate_count', 'user_count','name','vote_count', 'user_voted', 'user_not_voted'));

    }
}
