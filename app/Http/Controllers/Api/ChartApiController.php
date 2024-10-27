<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Support\Facades\Cache;

class ChartApiController extends Controller
{
    public function index()
    {
        $data = Cache::remember('chart_data', 60, function () {
            return Candidate::select('name', 'vote_count')->get();
        });

        $vote_count = $data->pluck('vote_count');
        $name = $data->pluck('name');

        return response()->json(compact('name', 'vote_count'));
    }
}
