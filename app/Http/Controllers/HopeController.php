<?php

namespace App\Http\Controllers;

use App\Models\Hope;
use App\Models\VoteSession;
use Illuminate\Http\Request;

class HopeController extends Controller
{
    public function index()
    {
        $VoteSession = VoteSession::latest()->first();
        $hopes = Hope::all();
        return view('dashboard.hope', compact('hopes', 'VoteSession'));
    }
}
