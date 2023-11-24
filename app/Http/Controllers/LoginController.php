<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.login');
    }
    public function authenticate(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            if (auth()->user()->role == 'admin') {
                $request->session()->regenerate();
                return redirect()->route('dashboard.home');
            } else if (auth()->user()->role == 'user') {
                if (auth()->user()->is_voted == true) {
                    request()->session()->invalidate();
                    request()->session()->regenerateToken();
                    return redirect()->route('login')->with('error', 'You have already voted!.');
                }
                $request->session()->regenerate();
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
