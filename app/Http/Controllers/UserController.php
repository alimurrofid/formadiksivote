<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
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
     * Reset is_voted status for all users.
     */
    public function resetAll()
    {
        User::where('is_voted', true)->update(['is_voted' => false]);
        return redirect()->route('user.index');
    }

    /**
     * Reset is_voted status for a user.
     */
    public function reset(User $user)
    {
        $user->update(['is_voted' => false]);
        return redirect()->route('user.index');
    }

    /**
     * Truncate all data from storage.
     */

    public function deleteAll()
    {
        User::truncate();
        return redirect()->route('user.index');
    }
}
