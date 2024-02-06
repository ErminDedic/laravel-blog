<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if user is active
            if (!$user->active) {
                // Redirect user to login page with message
                return redirect()->route('login')->with('error', 'Your account is inactive. Please contact the administrator.');
            }
        }

        return $next($request);
    }
}