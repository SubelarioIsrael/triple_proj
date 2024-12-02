<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureStudentRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Ensure the user is logged in and has a student role
        if (Auth::check() && Auth::user()->type === 'student') {
            return $next($request);
        }
        
        // Redirect to login or error page if not a student
        return redirect()->route('authentication.sign-in')->withErrors(['access' => 'Unauthorized access.']);
    }
}
