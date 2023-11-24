<?php

namespace App\Http\Controllers;

use App\Models\Hope;
use App\Models\User;
use App\Models\Candidate;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display all candidates for voting.
     */
    public function userVote()
    {
        $candidates = Candidate::all();
        return view('user.vote', compact('candidates'));
    }
    /**
     * Submit vote for a candidate.
     */
    public function voteCandidate(Request $request)
    {
        $candidate = Candidate::find($request->candidate_id);
        $candidate->vote_count += 1;
        $candidate->save();

        $user = User::find(Auth::user()->id);
        $user->is_voted = true;
        $user->candidate_id = $request->candidate_id;
        $user->save();

        $hope = new Hope();
        $hope->candidate_id = $request->candidate_id;
        $hope->user_id = Auth::user()->id;
        $hope->desire = $request->desire;
        $hope->save();

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Success', 'Terima kasih telah melakukan voting');
        return redirect()->route('login');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('dashboard.user', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            User::create([
                'name' => $request->validated('name'),
                'username' => $request->validated('username'),
                'password' => Hash::make($request->validated('password')),
            ]);

            Alert::success('Success', 'User berhasil ditambahkan');
            return redirect()->route('user.index');
        } catch (\Throwable $e) {
            Alert::error('Error', 'Terjadi kesalahan saat menambahkan user');
            return redirect()->back();
        }
    }

    /**
     * Import data from excel file.
     */
    public function importUsers(Request $request)
    {
        Excel::import(new UsersImport, $request->file);
        Alert::success('Success', 'User berhasil diimport');
        return redirect()->route('user.index')->with('success', 'User berhasil diimport');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->update([
                'name' => $request->validated('name'),
                'username' => $request->validated('username'),
                'password' => Hash::make($request->validated('password')),
            ]);
            Alert::success('Success', 'User berhasil diupdate');
            return redirect()->route('user.index');
        } catch (\Throwable $e) {
            Alert::error('Error', 'User Gagal diupdate');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Success', 'User berhasil dihapus');
        return redirect()->route('user.index');
    }

    /**
     * Reset is_voted status, relation candidate and hope for All user.
     */
    public function resetAll()
    {
        User::where('is_voted', true)->update(['is_voted' => false, 'candidate_id' => null]);
        Candidate::where('vote_count', '>', 0)->update(['vote_count' => 0]);
        Hope::truncate();
        return redirect()->route('user.index');
    }

    /**
     * Reset is_voted status, relation candidate and hope for user.
     */
    public function reset(User $user)
    {
        $user->candidate()->decrement('vote_count', 1);
        $user->update(['is_voted' => false, 'candidate_id' => null]);
        $user->hope()->delete();
        return redirect()->route('user.index');
    }

    /**
     * Delete all user except admin.
     */

    public function deleteAll()
    {
        Candidate::where('vote_count', '>', 0)->update(['vote_count' => 0]);
        //menghapus semua data pada tabel user kecuali admin
        User::where('role', '!=', '1')->delete();
        Hope::truncate();
        return redirect()->route('user.index');
    }
}
