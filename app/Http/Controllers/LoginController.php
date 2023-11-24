<?php

namespace App\Http\Controllers;

use App\Models\VoteSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.login');
    }
    /**
     * Start voting session.
     */
    public function startVoting(VoteSession $voteSession)
    {
        return $voteSession->actionCheck();
    }
    /**
     * Authenticate login.
     */
    public function authenticate(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $voteSession = VoteSession::latest()->first();
        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            if (auth()->user()->role == 'admin') {
                $request->session()->regenerate();
                return redirect()->route('dashboard.home');
            } else if (auth()->user()->role == 'user') {
                if (auth()->user()->is_voted == true) {
                    request()->session()->invalidate();
                    request()->session()->regenerateToken();
                    Alert::toast('Anda sudah melakukan voting', 'error');
                    return redirect()->route('login');
                } else if ($voteSession->session_run == 0) {
                    request()->session()->invalidate();
                    request()->session()->regenerateToken();
                    Alert::toast('Sesi voting belum dimulai', 'error');
                    return redirect()->route('login');
                }
                $request->session()->regenerate();
                Alert::toast('Selamat datang ' . auth()->user()->name, 'success');
                return redirect()->route('user.vote');
            }
        }
        return redirect()
            ->route('login')
            ->with('error', 'Incorrect username or password!.');
    }
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
