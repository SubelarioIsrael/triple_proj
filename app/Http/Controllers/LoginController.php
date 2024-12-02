<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // Validate request inputs
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'The username field is required.',
            'password.required' => 'The password field is required.',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Check if the username exists in the database
        $user = DB::table('users')->where('username', $username)->first();

        if (!$user) {
            // Username doesn't exist
            return back()->withErrors(['username' => 'Username not found']);
        }

        // Check if the password is correct
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            // Retrieve the authenticated user
            $user = Auth::user();
            
            // Check user role and redirect
            if ($user->type === 'admin') {
                return redirect()->route('admin.home');
            } elseif ($user->type === 'student') {
                return redirect()->route('authentication.sign-in-voice');
            }
        
            return back()->withErrors(['role' => 'User role is undefined']);
        } else {
            // Password is incorrect
            return back()->withErrors(['password' => 'Password incorrect']);
        }

        // If no valid role, show error
        return back()->withErrors(['role' => 'User role is undefined']);
    }

}
