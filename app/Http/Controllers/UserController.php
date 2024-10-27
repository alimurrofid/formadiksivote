<?php

namespace App\Http\Controllers;

use App\Models\Hope;
use App\Models\User;
use App\Models\Candidate;
use App\Models\VoteSession;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\VoteConfirmRequest;
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
    public function voteCandidate(VoteConfirmRequest $request)
    {
        try {
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
            Alert::toast('Terima kasih sudah melakukan voting', 'success');
            return redirect()->route('quickcount');
        } catch (\Throwable $e) {
            Alert::error('Error', 'Harapan wajiib diisi');
            return redirect()->back();
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        $title = 'Hapus User!';
        $text = "Apakah anda yakin ingin menghapus user ini?";
        confirmDelete($title, $text);
        $VoteSession = VoteSession::latest()->first();
        return view('dashboard.user', compact('users', 'VoteSession'));
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
        try {
            Excel::import(new UsersImport, $request->file);
            Alert::success('Success', 'User berhasil diimport');
            return redirect()->route('user.index')->with('success', 'User berhasil diimport');
        } catch (\Throwable $e) {
            Alert::error('Error', 'Terjadi kesalahan saat mengimport user');
            return redirect()->back();
        }
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
            $data = [
                'name' => $request->validated('name'),
                'username' => $request->validated('username'),
            ];

            if ($request->filled('password')) {
                if ($request->password !== $request->password_confirmation) {
                    return redirect()->back()->withErrors(['password_confirmation' => 'Password tidak cocok.']);
                }

                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);

            Alert::success('Success', 'User berhasil diupdate');
            return redirect()->route('user.index');
        } catch (\Throwable $e) {
            Alert::error('Error', 'User gagal diupdate');
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
