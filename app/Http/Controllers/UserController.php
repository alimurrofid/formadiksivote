<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user', [
            'users' => User::all()
        ]);
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
        Hash::make($request->password);
        User::create([
            'name' => $request->validated('name'),
            'username' => $request->validated('username'),
            'password' => Hash::make($request->validated('password')),
        ]);
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Import data from excel file.
     */
    public function importUsers(Request $request)
    {
        Excel::import(new UsersImport, $request->file);
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
        Hash::make($request->password);
        $user->update([
            'name' => $request->validated('name'),
            'username' => $request->validated('username'),
            'password' => Hash::make($request->validated('password')),
        ]);
        return redirect()->route('user.index')->with('success', 'User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }

    /**
     * Reset is_voted status for all users.
     */
    public function resetAll()
    {
        User::where('is_voted', true)->update(['is_voted' => false]);
        return redirect()->route('user.index')->with('success', 'User berhasil direset');
    }

    /**
     * Reset is_voted status for a user.
     */
    public function reset(User $user)
    {
        $user->update(['is_voted' => false]);
        return redirect()->route('user.index')->with('success', 'User berhasil direset');
    }

    /**
     * Truncate all data from storage.
     */

    public function deleteAll()
    {
        User::truncate();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}
