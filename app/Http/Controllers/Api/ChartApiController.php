<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class ChartApiController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        $vote_count = $candidates->pluck('vote_count');
        $name = $candidates->pluck('name');

        return response()->json(compact('name', 'vote_count'));
    }
}
