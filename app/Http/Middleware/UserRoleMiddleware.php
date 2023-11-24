<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Check & verify with route, you will more understand
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }
        return back()->with('loginError', 'Username atau Password yang anda masukkan salah');
    }
}
