<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use App\Models\VoteSession;
use Illuminate\Http\Request;

class DashboardHomeController extends Controller
{
    public function index()
    {
        //menampilkan jumlah candidate, user, user yang sudah vote, user yang belum vote
        $candidate_count = Candidate::all()->count();
        $user_count = User::all()->count();
        $user_voted = User::where('is_voted', true)->count();
        $user_not_voted = User::where('is_voted', false)->count();
        $VoteSession = VoteSession::latest()->first();

        return view('dashboard.home', compact('candidate_count', 'user_count', 'user_voted', 'user_not_voted', 'VoteSession'));

    }
}
